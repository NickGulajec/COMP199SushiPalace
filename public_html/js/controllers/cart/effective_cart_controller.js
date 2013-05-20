
var cart = new Object();


cart.EffectiveCartController = Class.create({
    initialize: function() {
        Event.observe(window, 'load', this.onLoadWindow.bind(this));
    },
    onLoadWindow: function() {
        // setting for change Quantity
        $$('.item select').each(function(select) {
            Event.observe(select, 'change', this.onChangeQuantity.bind(this));
        }.bind(this));
        // setting for click delete button
        $$('.item button').each(function(button) {
            Event.observe(button, 'click', this.onClickDelete.bind(this));
        }.bind(this));
    },
    // change Quantity
    onChangeQuantity: function(e) {
        // total amount update
        cart.EffectiveCartView.updateSum();
    },
    // click Delete botton 
    onClickDelete: function(e) {
        // e.targetは、<button id="delete1">など
        // get the id
        e.target.id.match(/delete(\d)/);
        var id = RegExp.$1;
        // delete item and total amount update
        cart.EffectiveCartView.deleteItem(id);
    }
});

new cart.EffectiveCartController();