ListEditItem = function($element, options) {
  JQueryPlugin.apply(this, arguments);
};

ListEditItem.prototype = $.extend(Object.create(JQueryPlugin.prototype), {
  constructor: ListEditItem,
  pluginName: 'listEditItem',

  init: function() {
    JQueryPlugin.prototype.init.apply(this, arguments);

    this.initProperties();
  },

  initProperties: function() {
    this.uniqueIndex = null;
    this.position = null;
  },

  initPlugins: function() {
    this.$element.find('select').each(function(i, el){
      var $el = $(el);
      var s2_options_var = $el.attr('data-s2-options');
      var select2_var = $el.attr('data-krajee-select2');
      var id = $el.attr('id');

      if (!!s2_options_var && !$el.data('select2')) {
        $.when($el.select2(window[select2_var])).done(initS2Loading(id, s2_options_var));
      }
    });
  },

  attachTo: function(listEdit, uniqueIndex) {
    this.listEdit = listEdit;
    this.uniqueIndex = uniqueIndex;
    this.registerEvents();
  },

  setPosition: function(value) {
    this.position = value;
  },

  prepareNewItem: function() {
    var $item = this.$element;
    var index= this.uniqueIndex;
    $item.find('.select2.select2-container').remove();

    $item.find('input, textarea, select').each(function(i, el){
      var $el = $(el);
      var name = $el.attr('name');
      var id = $el.attr('id');
      var dataSelect2Id = $el.attr('data-select2-id');

      name = name.replace('[-1]', '['+index+']');
      $el.attr('name', name);
      if (!!id) {
        id = id.replace('--1-', '-'+index+'-');
        $el.attr('id', id);
      }
      if (!!dataSelect2Id) {
        dataSelect2Id = dataSelect2Id.replace('--1-', '-'+index+'-');
        $el.attr('data-select2-id', dataSelect2Id);
      }
    });
    $item.find('label').each(function(i, el){
      var attrFor = $(el).attr('for');
      if (!!attrFor) {
        attrFor = attrFor.replace('--1-', '-'+index+'-');
        $(el).attr('for', attrFor);
      }
    });

    this.initPlugins();
  },

  registerEvents: function() {

  },

  getEventNamespace: function() {
    return 'listItem' + this.uniqueIndex;
  }
});

JQueryPlugin.addToJQuery(ListEditItem.prototype.pluginName, ListEditItem);

