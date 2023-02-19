/* Stub task to set the requested package (based on task name) for the runbuild task */

/* This will make a package of everything in one */
module.exports = function (grunt) {
	grunt.registerTask('full', function() {
		var fullPackage = {
				'plugins' : {'element' : [], 'form' : [], 'validationrule' : [], 'list' : [], 'cron' : [], 'visualization' : []},
				'jplugins' : [],
				'libraries' : [],
				'modules' : [],
				'component' : ''
		};

		/* Run through all the independant packages and combine everything */
		var packages = grunt.config.get('packages');
		Object.keys(packages).forEach((package) => {
			if (package.includes('//')) return;
			var packageParts = packages[package];
			Object.keys(packageParts).forEach((packagePart) => { 
				switch (packagePart) {
				case 'plugins':
					var plugins = packages[package]['plugins'];
					Object.keys(plugins).forEach((pluginType) => {
						pluginEls = packages[package]['plugins'][pluginType];
						pluginEls.forEach((plugin) => {
							fullPackage['plugins'][pluginType].push(plugin);
						});
					});
					break;
				case 'jplugins':
				case 'libraries':
				case 'modules':
					var parts = packages[package][packagePart];
					Object.keys(parts).forEach((part) => {
						fullPackage[packagePart].push(packages[package][packagePart][part]);
					});
					break;
				case 'component':
					fullPackage[packagePart] = packages[package][packagePart];
				default:
					break;
				}
			});
		});

		/* And we will use the core manifest file */
		fullPackage['manifest'] = 'pkg_fabrik.manifest.class.php'

		grunt.config.set('packages', {'full' : fullPackage});
		grunt.config.set('packagesToBuild', ['full']);
	});

}