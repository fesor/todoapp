import angular from 'angular';

import components from './components/components';
import services from './services/services';

export default angular
  .module('todoapp.ui.storymap', [
    components, services
  ])
  .config(function ($stateProvider) {
    "ngInject";

    $stateProvider
      .state('storymap', {
        url: '/',
        resolve: {
          cards: ['storyMap', (storyMap) => storyMap.cards ]
        },
        component: `todoStorymap`
      })
  })
  .name;
