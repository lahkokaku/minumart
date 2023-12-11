let maxSlot = 10
let cart = []
let item = {}

 
function validateQuantity(el){
    let quantity = el.siblings().children(".counter").val()
    return quantity  
}

function validateItem(id){
    let result = cart.filter(curr => curr.id == id)
    return result.length == 0 ? true : false
}

function appendTable (){
    let html = 
    
    `
    <tr id="${item.id}">
        <th scope="row">${item.id}</th>
        <td class="name">${item.name}</td>
        <td class="quantity">${item.quantity}</td>
        <td class="total-price">${item.totalPrice}</td>
        <td class="d-flex justify-content-center align-items-center" > 
            <button class="btn btn-danger btn-sm fw-bold remove"  data-beverage="${item.id}"  > X </button>
        </td>
    </tr>
    `
    $('#show-cart').append(html)
}

function deleteTable(el){
    let id = el.data('beverage')
    cart.map( (curr,index) => {
        if (curr.id == id) cart.splice(index,1)
    });
    if (cart.length <= 0 ) $('#submit').attr('disabled', true)
    $(`tr#${id}`).remove()
    
}

function calculateTotalPrice(){

    return cart.reduce( (acc,curr) => acc+curr.totalPrice ,0)
}

function updateTable(item){
    let search = `#${item.id}`
    console.log(search);
    console.log($(search) )
    $(search).children(".quantity").text(item.quantity)
    $(search).children(".total-price").text(item.totalPrice)
}

$("body").on("click",'.remove', function(){
    deleteTable($(this));
    $("#cart-length").text(cart.length)
    console.log(cart.length);
    $('#price').html(calculateTotalPrice())
  });
 

function toggleCart(){
    if(!$('#cart-detail').hasClass('d-none')){
        $('body').click(function(){
            $('#cart-detail').toggleClass('d-none')

        })
    }
    else{
        $("#cart").click(function(){
            $("#cart-detail").removeClass("d-none");
        })
        
    }    
}

$('body').click(function(){
    toggleCart()
})
 
//add to cart
$(".add-to-cart").click(function(){
    // validate quantity
    let quantity = parseInt(validateQuantity($(this)))
    if (quantity === 0) return
    
    item.id = $(this).data("id")
    item.name = $(this).data("name")
    item.price = $(this).data("price")
    item.quantity = quantity
    item.totalPrice =  parseInt($(this).data("price")) * quantity
    
    // validate if the item has already been added to cart 
    let novelty =  validateItem(item.id);
    if (novelty){
        cart.push(item)
        //update shopping cart
        $("#cart-length").text(cart.length)
        appendTable()
    } 
    else {
        let result = cart.filter(curr => curr.id == item.id)[0]
        result.quantity += quantity;
        result.totalPrice += item.totalPrice;
        updateTable(result);
    }
    
    let total = calculateTotalPrice()
    $('#price').html(`Rp ${total}`)
    //reset 
    item = {}
    $(this).siblings().children(".counter").val(0)
    
    // remove disable submit button
    $('#submit').attr('disabled', false)

})


$('#form').submit(function(){
    let id = []
    let quantity = []
    cart.map( (curr) => {
        id.push(curr.id)
        quantity.push(curr.quantity)
    })
    $('#id').val(id);
    $('#quantity').val(quantity);
    $('#grand_total').val(calculateTotalPrice);
})

$(".btnIncrement").click(function() {
    let currentCount = parseInt($(this).siblings(".counter").val());
    
    if (currentCount >= maxSlot) {
        $(this).prop("disabled", true);
    } else {
        $(this).prop("disabled", false);
        $(this).siblings('.counter').val(currentCount + 1)
    }
    if (currentCount == 0) $(this).siblings('.btnDecrement').prop("disabled", false);
})

$(".btnDecrement").click(function() {
    let currentCount = parseInt($(this).siblings(".counter").val());

    if (currentCount <= 0) {
        $(this).prop("disabled", true);
    } else {
        $(this).prop("disabled", false);
        $(this).siblings(".counter").val(currentCount - 1)
    }
    if (currentCount == maxSlot) $(this).siblings('.btnIncrement').prop("disabled", false);
})