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
    'grapesjs-tooltip',
    'grapesjs-tabs',
    'grapesjs-tui-image-editor',
    'grapesjs-plugin-export',
    'grapesjs-blocks-flexbox',
    'grapesjs-custom-code',
    'grapesjs-indexeddb',
    'grapesjs-parser-postcss',
    'grapesjs-preset-webpage'
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
    },
    'grapesjs-preset-webpage': {}
  }
});

editor.Panels.addButton('options', [{
      id: 'edit-html',
      className: 'fa fa-code',
      command: 'open-html-editor',
      attributes: { title: 'Edit HTML' }
  }]);

editor.Commands.add('open-html-editor', {
  run(editor) {
      const code = editor.getHtml();
      const htmlEditor = document.createElement('textarea');
      htmlEditor.value = code;
      htmlEditor.style.width = '100%';
      htmlEditor.style.height = '300px';
      
      const saveButton = document.createElement('button');
      saveButton.innerText = 'Save';
      saveButton.style.marginTop = '10px';

      const modalContent = document.createElement('div');
      modalContent.appendChild(htmlEditor);
      modalContent.appendChild(saveButton);

      Swal.fire({
          title: 'Edit HTML',
          html: modalContent,
          showCancelButton: true,
          preConfirm: () => {
              editor.setComponents(htmlEditor.value);
          }
      });

      saveButton.addEventListener('click', () => {
          editor.setComponents(htmlEditor.value);
          Swal.close();
      });
  }
});