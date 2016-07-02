import './card.less';

export class CardComponent {
  $onInit() {

  }
}

export default {
  bindings: {
    card: '='
  },
  template: `
    <div class="card">{{$ctrl.card.description}}</div>
  `,
  controller: CardComponent
}
