import angular from 'angular'
import uiRouter from 'angular-ui-router';
import todoCard from './card.component';
import storyMap from './storymap.component';
import cardCollection from './cardCollection.component';

export default angular
  .module('todoapp.ui.storymap.components', [uiRouter])
  .component('todoCard', todoCard)
  .component('todoStorymap', storyMap)
  .component('todoCardCollection', cardCollection)
  .name;
