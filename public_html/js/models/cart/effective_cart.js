cart.EffectiveCart = {
    // calculate total in shoppinc cart
    getSum: function() {
        var sum = 0;
        var qty = 0;
        $$('.item').each(function(item) {
            item.id.match(/item(\d)/);
            var id = RegExp.$1;
            sum += $("price" + id).innerHTML * 
                $("select" + id).value;
        }.bind(this));
        return sum;
    }
    getQty: function() {
        var qty = 0;
        $$('.item').each(function(item) {
            item.id.match(/item(\d)/);
            var id = RegExp.$1;
            qty = $("select" + id).value;
        }.bind(this));
        return qty;
    }

}
