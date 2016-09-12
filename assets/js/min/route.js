'use strict';

/* eslint strict: ["error", "function"] */
/* eslint func-names: ["error", "never"] */
/* eslint-disable max-len */
/* eslint-env es6 */
(function () {
  angular.module('codepress')
  // .config( ['$routeProvider', function( $routeProvider ) {
  //   $routeProvider.when('/generators/wordpress', {
  //     controller: 'WordPressController',
  //     templateUrl: codepress.addon.wordpress + 'assets/views/wordpress-all-items.html'
  //   }).when( '/generators/wordpress/:slug', {
  //     controller: 'WordPressTemplateController',
  //     templateUrl: codepress.addon.wordpress + 'assets/views/template.html'
  //   });
  // }] )
  // Add custom icons from https://materialdesignicons.com/
  .config(['ngMdIconServiceProvider', function (ngMdIconServiceProvider) {
    ngMdIconServiceProvider.addShapes({
      backend: '<path d="M8,10H16V18H11L9,16H7V11M7,4V6H10V8H7L5,10V13H3V10H1V18H3V15H5V18H8L10,20H18V16H20V19H23V9H20V12H18V8H12V6H15V4H7Z" />',
      wordpress: '<path d="M12.2,15.5L9.65,21.72C10.4,21.9 11.19,22 12,22C12.84,22 13.66,21.9 14.44,21.7M20.61,7.06C20.8,7.96 20.76,9.05 20.39,10.25C19.42,13.37 17,19 16.1,21.13C19.58,19.58 22,16.12 22,12.1C22,10.26 21.5,8.53 20.61,7.06M4.31,8.64C4.31,8.64 3.82,8 3.31,8H2.78C2.28,9.13 2,10.62 2,12C2,16.09 4.5,19.61 8.12,21.11M3.13,7.14C4.8,4.03 8.14,2 12,2C14.5,2 16.78,3.06 18.53,4.56C18.03,4.46 17.5,4.57 16.93,4.89C15.64,5.63 15.22,7.71 16.89,8.76C17.94,9.41 18.31,11.04 18.27,12.04C18.24,13.03 15.85,17.61 15.85,17.61L13.5,9.63C13.5,9.63 13.44,9.07 13.44,8.91C13.44,8.71 13.5,8.46 13.63,8.31C13.72,8.22 13.85,8 14,8H15.11V7.14H9.11V8H9.3C9.5,8 9.69,8.29 9.87,8.47C10.09,8.7 10.37,9.55 10.7,10.43L11.57,13.3L9.69,17.63L7.63,8.97C7.63,8.97 7.69,8.37 7.82,8.27C7.9,8.2 8,8 8.17,8H8.22V7.14H3.13Z" />',
      cpt: '<path d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M15,18V16H6V18H15M18,14V12H6V14H18Z" />',
      tag: '<path d="M5.5,7A1.5,1.5 0 0,1 4,5.5A1.5,1.5 0 0,1 5.5,4A1.5,1.5 0 0,1 7,5.5A1.5,1.5 0 0,1 5.5,7M21.41,11.58L12.41,2.58C12.05,2.22 11.55,2 11,2H4C2.89,2 2,2.89 2,4V11C2,11.55 2.22,12.05 2.59,12.41L11.58,21.41C11.95,21.77 12.45,22 13,22C13.55,22 14.05,21.77 14.41,21.41L21.41,14.41C21.78,14.05 22,13.55 22,13C22,12.44 21.77,11.94 21.41,11.58Z" />',
      'copy-clipboard': '<path d="M7,8V6H5V19H19V6H17V8H7M9,4A3,3 0 0,1 12,1A3,3 0 0,1 15,4H19A2,2 0 0,1 21,6V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V6A2,2 0 0,1 5,4H9M12,3A1,1 0 0,0 11,4A1,1 0 0,0 12,5A1,1 0 0,0 13,4A1,1 0 0,0 12,3Z" /> <path d="M 10.305085,9.6101696 A 0.84745762,0.84745762 0 0 0 9.4576273,10.457627 l 0,1.694916 A 0.84745762,0.84745762 0 0 1 8.6101697,13 l -0.4237288,0 0,0.847458 0.4237288,0 a 0.84745762,0.84745762 0 0 1 0.8474576,0.847457 l 0,1.694916 a 0.84745762,0.84745762 0 0 0 0.8474577,0.847457 l 0.847458,0 0,-0.847457 -0.847458,0 0,-2.118644 A 0.84745762,0.84745762 0 0 0 9.4576273,13.423729 0.84745762,0.84745762 0 0 0 10.305085,12.576271 l 0,-2.118644 0.847458,0 0,-0.8474574 m 2.542372,0 a 0.84745762,0.84745762 0 0 1 0.847458,0.8474574 l 0,1.694916 A 0.84745762,0.84745762 0 0 0 15.389831,13 l 0.423728,0 0,0.847458 -0.423728,0 a 0.84745762,0.84745762 0 0 0 -0.847458,0.847457 l 0,1.694916 a 0.84745762,0.84745762 0 0 1 -0.847458,0.847457 l -0.847457,0 0,-0.847457 0.847457,0 0,-2.118644 a 0.84745762,0.84745762 0 0 1 0.847458,-0.847458 0.84745762,0.84745762 0 0 1 -0.847458,-0.847458 l 0,-2.118644 -0.847457,0 0,-0.8474574 0.847457,0 z" />'
    });
  }]);
})();