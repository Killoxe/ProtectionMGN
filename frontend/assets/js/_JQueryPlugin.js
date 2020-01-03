JQueryPlugin = function($element, options) {
  if (this.pluginName === undefined || this.pluginName === null || this.pluginName === '')
    throw new Error('Static attribute "pluginName" must be set');

  this.destroyElementData($element);

  this.$element = $element;
  this.options = $.extend({}, this.defaultOptions(), options);

  this.init();

  this.setElementData($element);
};

JQueryPlugin.prototype.destroyElementData = function($element) {
  var plugin = $element.data(this.pluginName);
  if (plugin !== undefined && plugin !== null) {
    plugin.destroy();
  }
};

JQueryPlugin.prototype.setElementData = function($element) {
  $element.data(this.pluginName, this);
};

JQueryPlugin.prototype.init = function($element) {

};

JQueryPlugin.prototype.destroy = function() {
  this.$element.data(this.name, null);
};

JQueryPlugin.prototype.defaultOptions = function() {
  return {};
};

JQueryPlugin.addToJQuery = function(name, Plugin) {
  if ($.fn[name] === undefined || $.fn[name] === null) {
    $.fn[name] = function (options) {
      options = options || {};

      if (typeof options === 'object') {
        this.each(function () {
          var instanceOptions = $.extend(true, {}, options);

          var instance = new Plugin($(this), instanceOptions);
        });

        return this;
      } else {
        throw new Error('Invalid arguments for JQueryPlugin: ' + options);
      }
    };
  }
};