ListEdit = function($element, options) {
  JQueryPlugin.apply(this, arguments);
};

ListEdit.prototype = $.extend(Object.create(JQueryPlugin.prototype), {
  constructor: ListEdit,
  pluginName: 'listEdit',

  init: function() {
    JQueryPlugin.prototype.init.apply(this, arguments);
    var self = this;

    this.$itemsContainer = this.$element.find(this.options.itemsContainerSelector);
    this.$templateItem = this.$element.find(this.options.templateItemSelector);
    this.$actionsContainer = this.$element.find(this.options.actionsContainerSelector);

    this._itemNextIndex = this.$element.find(this.options.itemSelector).length;

    this.initItems();
    this.registerEvents();

    this.options.actions.forEach(function(item) {
      item.attachTo(self);
    });
    this.options.itemActions.forEach(function(item) {
      item.attachTo(self);
    });
  },

  defaultOptions: function() {
    return {
      itemsContainerSelector: '.list-edit__items',
      templateItemSelector: '.list-edit__item--template',
      itemSelector: '.list-edit__item',
      itemCssClass: 'list-edit__item',
      actionsContainerSelector: '.list-edit__actions',
      actions: [],
      itemActions: [],
      itemPluginName: 'listEditItem',
      itemPluginOptions: {}
    };
  },

  initItems: function() {
    var self = this;
    this.$element.find(this.options.itemSelector).each(function(i, el) {
      self.initItem($(el), i);
      self.getItemPlugin($(el)).setPosition(i+1);
    })
  },

  initItem: function($item, index) {
    $item[this.options.itemPluginName](this.options.itemPluginOptions);
    this.getItemPlugin($item).attachTo(this, index);
  },

  getItemNextIndex: function() {
    var nextIndex = this._itemNextIndex;
    this._itemNextIndex++;
    return nextIndex;
  },

  registerEvents: function() {

  },

  getNewItem: function() {
    var nextIndex = this.getItemNextIndex();
    var $newItem = this.$templateItem.clone();

    $newItem
      .removeClass()
      .addClass(this.options.itemCssClass);

    this.initItem($newItem, nextIndex);
    this.getItemPlugin($newItem).prepareNewItem(nextIndex);

    return $newItem;
  },

  appendItem: function($item) {
    var position = this.$element.find(this.options.itemSelector).length + 1;
    this.getItemPlugin($item).setPosition(position);
    this.$itemsContainer.append($item);
  },

  deleteItem: function($item) {
    $item.remove();
    this.updateItemsPosition();
  },

  updateItemsPosition: function() {
    var self = this;
    this.$element.find(this.options.itemSelector).each(function(i, el) {
      self.getItemPlugin($(el)).setPosition(i+1);
    })
  },

  getItemPlugin: function($item) {
    return $item.data(this.options.itemPluginName)
  },

  getOptionsClone: function() {
    var options = $.extend({}, this.options);
    options.itemPluginOptions = $.extend({}, options.itemPluginOptions);

    options.actions = options.actions.map(function(action) {
      var actionOptions = action.options;
      return new action.constructor(actionOptions);
    });

    options.itemActions = options.itemActions.map(function(action) {
      var actionOptions = action.options;
      return new action.constructor(actionOptions);
    });

    return options;
  }
});

JQueryPlugin.addToJQuery(ListEdit.prototype.pluginName, ListEdit);
