ListEditActionCreate = function(options) {
  ListEditExtension.apply(this, arguments);
};

ListEditActionCreate.prototype = $.extend(Object.create(ListEditExtension.prototype), {
  constructor: ListEditActionCreate,

  defaultOptions: function() {
    return {
      selector: ''
    };
  },

  registerEvents: function() {
    var self = this;
    this.listEdit.$actionsContainer.find(this.options.selector).on('click', function(e) {
      e.preventDefault();
      self.createNewItem();
      return false;
    });
  },

  createNewItem: function() {
    var $item = this.listEdit.getNewItem();
    this.listEdit.appendItem($item);
  }
});
