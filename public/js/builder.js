var editor = grapesjs.init({
  container: '#gjs',
  fromElement: true,
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

editor.Commands.add('undo', {
  run(editor, sender) {
    sender.set('active', false);
    editor.UndoManager.undo();
  }
});

editor.Commands.add('redo', {
  run(editor, sender) {
    sender.set('active', false);
    editor.UndoManager.redo();
  }
});

editor.Panels.addButton('options', {
  id: 'undo',
  className: 'fa fa-undo',
  command: 'undo',
  attributes: { title: 'Undo' }
});
editor.Panels.addButton('options', {
  id: 'redo',
  className: 'fa fa-repeat',
  command: 'redo',
  attributes: { title: 'Redo' }
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