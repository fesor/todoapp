class CardCollectionComponent {
  containsStories() {
    return this.topLevelCard && this.topLevelCard.type === 'epic';
  }
}

export default {
  bindings: {
    topLevelCard: '=',
    layout: '<'
  },
  template: `
    <div class="card-collection">
        <div class="parent-card">
           <todo-card card="$ctrl.topLevelCard"></todo-card>
        </div>
        <div class="cards-container" ng-if="!$ctrl.containsStories()">
            <todo-card-collection 
                ng-repeat="card in $ctrl.topLevelCard.cards" 
                top-level-card="card">
            </todo-card-collection>
        </div>
        <div class="cards-container cards-container-col" ng-if="$ctrl.containsStories()">
            <todo-card card="card" ng-repeat="card in $ctrl.topLevelCard.cards"></todo-card>
        </div>
    </div>
  `,
  controller: CardCollectionComponent
}
