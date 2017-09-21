/*                    Additional Module Declarations                         */
angular.module('controllers', []);
angular.module('directives', []);
/*****************************************************************************/


/*                            Configuration Settings                         */
var dependencyList = ['ngMaterial', 'controllers', 'directives'];

var themeColors = {
    primary: 'red', accent: 'deep-orange',
    warn: 'orange', background: 'grey'
};

/*****************************************************************************/


/*                       Main Application Setup                              */
angular.module('badgerloop-secure', dependencyList)

.config(function($mdThemingProvider) {

    /*************************  Theme Settings  ******************************/
	$mdThemingProvider
	.theme('default')
	.primaryPalette(themeColors.primary)
	.accentPalette(themeColors.accent)
	.warnPalette(themeColors.warn)
	.backgroundPalette(themeColors.background);
	$mdThemingProvider
	.theme('dark')
	.primaryPalette(themeColors.primary).dark();
    /*************************************************************************/

});
/*****************************************************************************/

