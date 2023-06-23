<?php

namespace WP_Rocket\Tests\Unit\inc\Engine\Common\Cache\FilesystemCache;

use Mockery;
use WP_Rocket\Engine\Common\Cache\FilesystemCache;
use WP_Filesystem_Direct;

use Brain\Monkey\Functions;
use WP_Rocket\Tests\Unit\TestCase;

/**
 * @covers \WP_Rocket\Engine\Common\Cache\FilesystemCache::generate_url
 */
class Test_generateUrl extends TestCase {

    /**
     * @var string
     */
    protected $root_folder;

    /**
     * @var WP_Filesystem_Direct
     */
    protected $filesystem;

    /**
     * @var FilesystemCache
     */
    protected $filesystemcache;

    public function set_up() {
        parent::set_up();
        $this->root_folder = '/background-css/';
        $this->filesystem = Mockery::mock(WP_Filesystem_Direct::class);

        $this->filesystemcache = new FilesystemCache($this->root_folder, $this->filesystem);
    }

    /**
     * @dataProvider configTestData
     */
    public function testShouldReturnAsExpected( $config, $expected )
    {
		Functions\expect('get_rocket_parse_url')->with($expected['url'])->andReturn($config['parsed_url']);
		Functions\expect('_rocket_get_wp_rocket_cache_path')->andReturn($config['root']);

		Functions\when('rocket_get_constant')->alias(function ($name, $default = false) use ($config) {
			if('WP_CONTENT_URL' === $name) {
				return $config['WP_CONTENT_URL'];
			}
			if('WP_CONTENT_DIR' === $name) {
				return $config['WP_CONTENT_DIR'];
			}

			return $default;
		});

		$this->filesystem->expects()->exists($expected['path'])->andReturn($config['exists']);

        $this->assertSame($expected['output'], $this->filesystemcache->generate_url($config['url']));

    }
}
