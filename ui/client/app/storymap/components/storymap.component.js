import './storymap.less';

class StoryMapComponent {
  $onInit() {
    this.withChilds = true;
    console.log('cards:', this.cards)
  }
}

export default {
  bindings: {
    cards: '='
  },
  template: `
    <todo-card-collection ng-repeat="card in $ctrl.cards" top-level-card="card"></todo-card-collection>
  `,
  controller: StoryMapComponent
}
