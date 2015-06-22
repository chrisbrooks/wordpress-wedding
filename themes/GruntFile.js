var paths = {
	build: 'wedding/',
	src: 'src/',
	assets: 'src/assets/',
	bower: 'bower_components/'
}

var scriptsList = {
	'wedding/scripts/combined.min.js': [
		paths.assets + 'scripts/custom/script.js',
		paths.assets + 'scripts/custom/maps.js'
	],
	'wedding/scripts/vendor/plugins.min.js': [
		paths.bower + 'jquery/dist/jquery.js',
		paths.bower + 'hammerjs/hammer.js',
		paths.assets + 'scripts/vendor/instagram.js',
		paths.assets + 'scripts/vendor/modernizr.js',
		paths.assets + 'scripts/vendor/bootstrap.js',
		paths.assets + 'scripts/vendor/jquery.nav.js',
		paths.bower + 'jQuery.mmenu/dist/js/jquery.mmenu.min.js',
		paths.bower + 'jQuery.mmenu/dist/js/addons/jquery.mmenu.dragopen.min.js',
		paths.bower + 'fastclick/lib/fastclick.js'
	]
};


module.exports = function(grunt) {

	grunt.initConfig({

		jshint: {

			files: paths.assets + 'scripts/custom/*.js',

			options: {
				globals: {
					jQuery: true,
					console: true,
					module: true
				}
			}
		},

		uglify: {

			development : {
				options: {
					beautify: false,
					compress: true
				},
				files: scriptsList
			},

			release : {
				options: {
					compress: true
				},
				files: scriptsList
			}
		},

		sass: {

			development: {
				options: {
					style: 'compressed'
				},
				files: {
					'wedding/style.css': paths.assets + 'styles/app.scss',
				}
			},

			release: {
				options: {
					style: 'compressed'
				},
				files: {
					'wedding/style.css': paths.assets + 'styles/app.scss',
				}
			}
		},

		autoprefixer: {

			build: {
				expand: true,
				flatten: true,
				src: paths.build + 'style.css',
				dest: paths.build
			}
		},

		copy: {

			images: {
				files: [{
					expand: true,
					cwd: paths.assets + 'images',
					src: ['**/*.{png,jpg,gif,svg,ico}'],
					dest: paths.build + 'images/'
				}]
			},

			media: {
				files: [{
					expand: true,
					cwd: paths.assets + 'media',
					src: ['**/*.{png,jpg,gif,svg}'],
					dest: paths.build + 'media/'
				}]
			},

			fonts: {
				files: [
					{
						expand: true,
						cwd: paths.assets + 'fonts',
						src: ['**/*.{eot,svg,ttf,woff,woff2}'],
						dest: paths.build + 'fonts/'
					}
				]
			},

			videos: {
				files: [{
					expand: true,
					cwd: paths.assets + 'video',
					src: ['**/*'],
					dest: paths.build + 'video/'
				}]
			},

			pdf: {
				files: [{
					expand: true,
					cwd: paths.assets,
					src: ['**/*.pdf'],
					dest: paths.build + ''
				}]
			}
		},

		clean: {

			build: {
				src: ['wedding/images', 'wedding/scripts', 'wedding/style.css','wedding/video','wedding/fonts']
			}
		},

		watch: {

			// Watch grunt file
			grunt: {
				files: 'GruntFile.js',
				tasks: ['development'],
				options: {
					livereload: false,
					interrupt: true
				}
			},

			// Run SASS compliler when precompiled files are changed
			styles: {
				files: paths.assets + 'styles/**/*.scss',
				tasks: ['sass:development'],
				options: {
					livereload: false,
					spawn: false
				}
			},

			images: {
				files: [paths.assets + 'images/**/*.{png,jpg,gif,svg,ico}'],
				tasks: ['copy:images'],
				options: {
					livereload: false,
					interrupt: true
				}
			},

			media: {
				files: [paths.assets + 'media/**/*.{png,jpg,gif}'],
				tasks: ['copy:media'],
				options: {
					livereload: false,
					interrupt: true
				}
			},

			fonts: {
				files: [paths.assets + 'fonts/**/*.{eot,svg,ttf,woff,woff2}'],
				tasks: ['copy:fonts'],
				options: {
					livereload: false,
					interrupt: true
				}
			},

			videos: {
				files: [paths.assets + 'video/**/*.{mp4,ogv,webm}'],
				tasks: ['copy:videos'],
				options: {
					livereload: false,
					interrupt: true
				}
			},

			scripts: {
				files: [paths.assets + 'scripts/**/*.js'],
				tasks: ['uglify:development'],
				options: {
					livereload: false,
					interrupt: true
				}
			},

		},

	});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');

	// Register task(s) to run when 'grunt' command is executed
	grunt.registerTask('default', ['development']);

	// Register task(s) to run when 'grunt development' command is executed
	grunt.registerTask('development', [
		'jshint',
		'clean',
		'sass:development',
		'autoprefixer',
		'copy',
		'uglify:development',
		'watch'
	]);

	// Register task(s) to run when 'grunt release' command is executed
	grunt.registerTask('release', [
		'clean',
		'sass:release',
		'autoprefixer',
		'copy',
		'uglify:release',
	]);

};
