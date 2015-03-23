module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
			},

			all: {
				files: grunt.file.expandMapping(['./plugins/fabrik_*/*/*.js',  "!./plugins/fabrik_*/**/*-min.js"], './plugins/fabrik_*/*/*.js', {
					rename: function(destBase, destPath) {
						console.log('making ' + destPath.replace('.js', '-min.js'));
						return destPath.replace('.js', '-min.js');
					}
				})
			}
		}
	});

	// Load the plugin that provides the "uglify" task.
	grunt.loadNpmTasks('grunt-contrib-uglify');

	// Default task(s).
	grunt.registerTask('default', ['uglify']);

};