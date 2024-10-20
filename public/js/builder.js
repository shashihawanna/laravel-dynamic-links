var editor = grapesjs.init({
  container: '#gjs',
  fromElement: 1,
  height: '500px',
  width: 'auto',
  storageManager: { type: 'indexeddb' },
  plugins: [ 
    'gjs-blocks-basic',
    'grapesjs-plugin-forms', 
    'grapesjs-navbar',
    'grapesjs-component-countdown',
    'grapesjs-tui-image-editor',
    'grapesjs-plugin-export',
    'grapesjs-blocks-flexbox',
    'grapesjs-tabs',
    'grapesjs-tooltip',
    'grapesjs-custom-code',
    'grapesjs-indexeddb',
    'grapesjs-parser-postcss'
  ],
  pluginsOpts: {
    'gjs-blocks-basic': {},
    'grapesjs-navbar': {},
    'grapesjs-component-countdown': {},
    'grapesjs-plugin-forms': {},
    'grapesjs-tui-image-editor': {},
    'grapesjs-plugin-export': {},
    'grapesjs-blocks-flexbox': {},
    'grapesjs-tabs': {},
    'grapesjs-tooltip': {},
    'grapesjs-custom-code': {},
    'grapesjs-indexeddb': {
      options: {
        key: 'web-builder-id',
        dbName: 'webPageBuilderLocalDB',
        objectStoreName: 'projects',
      }
    }
  }
});

editor.Panels.addButton('options', [{
  id: 'clear-canvas',
  className: 'fa fa-trash',
  command: 'clear-canvas',
  attributes: { title: 'Clear Canvas' }
}]);

editor.Commands.add('clear-canvas', {
  run: function(editor) {
    if (confirm('Are you sure you want to clear the canvas?')) {
      editor.DomComponents.clear(); 
      editor.CssComposer.clear(); 
    }
  }
});
