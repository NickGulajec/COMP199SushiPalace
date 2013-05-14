cart.EffectiveCartView = {
    // deleteItem
    deleteItem: function(id) {
        $("item" + id).remove();
        this.updateSum();
    },
    // updateSum
    updateSum: function() {
        var sum = cart.EffectiveCart.getSum();
        $("cost").innerHTML = sum;
    }
}
