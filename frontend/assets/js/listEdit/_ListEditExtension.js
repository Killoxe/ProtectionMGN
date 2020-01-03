ListEditExtension = function(options) {
  this.options = $.extend({}, this.defaultOptions(), options);
};

ListEditExtension.prototype.defaultOptions = function() {
  return {};
};

ListEditExtension.prototype.attachTo = function(listEdit) {
  this.listEdit = listEdit;
  this.registerEvents();
};

ListEditExtension.prototype.registerEvents = function() {

};