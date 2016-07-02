import angular from 'angular';
import uiRouter from 'angular-ui-router';
import Common from './common/common';
import storyMap from './storymap/storymap';
import AppComponent from './app.component';
import 'normalize.css';

angular.module('todoapp.ui', [
    uiRouter,
    Common,
    storyMap
  ])
  .config(($locationProvider, $logProvider) => {
    "ngInject";
    // @see: https://github.com/angular-ui/ui-router/wiki/Frequently-Asked-Questions
    // #how-to-configure-your-server-to-work-with-html5mode
    $locationProvider.html5Mode(true).hashPrefix('!');
    $logProvider.debugEnabled(true);
  })

  .component('app', AppComponent);
