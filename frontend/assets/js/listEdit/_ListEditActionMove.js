ListEditActionMove = function(options) {
  ListEditExtension.apply(this, arguments);
};

ListEditActionMove.prototype = $.extend(Object.create(ListEditExtension.prototype), {
  constructor: ListEditActionMove,

  defaultOptions: function() {
    return {
      selector: ''
    };
  },

  registerEvents: function() {
    var self = this;
    this.listEdit.$itemsContainer.sortable({
      handle: this.options.selector,
      axis: 'y',
      cursor: 'move',
      containment: 'parent'
    });

    this.listEdit.$itemsContainer.on('sortupdate', function (event, ui) {
      self.listEdit.$element
        .find(self.listEdit.options.itemSelector)
        .not('.ui-sortable-placeholder')
        .each(function(i, el) {
          var plugin = self.listEdit.getItemPlugin($(el));
          if (!!plugin)
            plugin.setPosition(i+1);
        });
    });

    this.listEdit.$itemsContainer.on('click', this.options.selector, function(e) {
      e.preventDefault();
      return false;
    });
  }

});
