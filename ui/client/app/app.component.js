import './app.less';

let appComponent = {
  template: `
    <div class="app">
      <div ui-view></div>
    </div>
  `,
  restrict: 'E'
};

export default appComponent;
