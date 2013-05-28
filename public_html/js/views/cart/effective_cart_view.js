cart.EffectiveCartView = {
    // deleteItem
    deleteItem: function(id) {
        $("item" + id).remove();
        this.updateSum();
    },
    // updateSum
    updateSum: function() {
        var sum = cart.EffectiveCart.getSum();
        $("cost").innerHTML = sum.toFixed(2);
	var qty = cart.EffectiveCart.getQty();
        //$("changeQty").innerHTML = qty;
	this.sendQty(qty);
     },
    sendQty: function(qty) {
	$.ajax({
                type: "POST",
                url: "test.php",
                data: 'qty=' + qty,
                success:function(data){
                    alert(data);
                }
            });
    }
}
