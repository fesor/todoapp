import './app.less';

let appComponent = {
  template: `
    <div class="header">Header</div>
    <ui-view></ui-view>
  `,
  restrict: 'E'
};

export default appComponent;
