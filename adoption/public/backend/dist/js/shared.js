$("#edit_users").on("shown.bs.modal", function (e) {
    const modal = $(this);
    const link = $(e.relatedTarget);
    const id = link.data("id");
    const name = link.data("name");
    const email = link.data("email");
    const password = link.data("password");
    const contact_number = link.data("contact_number");
    const address = link.data("address");


    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #name").val(name);
    modal.find(".modal-body #email").val(email);
    modal.find(".modal-body #password").val(password);
    modal.find(".modal-body #contact_number").val(contact_number);
    modal.find(".modal-body #address").val(address);

});
$("#edit_listings").on("shown.bs.modal", function (e) {
    const modal = $(this);
    const link = $(e.relatedTarget);
    const id = link.data("id");
    const title = link.data("title");
    const description = link.data("description");
    const category = link.data("category");
    const gender = link.data("gender");
    const images = link.data("images");
    const status = link.data("status");

    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #title").val(title);
    modal.find(".modal-body #description").val(description);
    modal.find(".modal-body #category").val(category);
    modal.find(`.modal-body #category option[value=${category}]`).prop('selected', true);
    modal.find(".modal-body #gender").val(gender);
    modal.find(".modal-body #images").val(images);
    modal.find(".modal-body #status").val(status);
    modal.find(`.modal-body #status option[value=${status}]`).prop('selected', true);

});

$("#edit_messages").on("shown.bs.modal", function (e) {
    const modal = $(this);
    const link = $(e.relatedTarget);
    const id = link.data("id");
    const name = link.data("name");
    const email = link.data("email");
    const subject = link.data("subject");
    const message_content = link.data("message_content");

    console.log(id)

    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #name").val(name);
    modal.find(".modal-body #email").val(email);
    modal.find(".modal-body #subject").val(subject);
    modal.find(".modal-body #message_content").val(message_content);
});

$("#edit_reviews").on("shown.bs.modal", function (e) {
    const modal = $(this);
    const link = $(e.relatedTarget);
    const id = link.data("id");
    const user_id = link.data("user_id");
    const listing_id = link.data("listing_id");
    const rating = link.data("rating");
    const review_content = link.data("review_content");


    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #user_id").val(user_id);
    modal.find(".modal-body #listing_id").val(listing_id);
    modal.find(".modal-body #rating").val(rating);
    modal.find(".modal-body #review_content").val(review_content);
    modal.find(`.modal-body #rating option[value=${rating}]`).prop('selected', true);


});
$("#edit_transactions").on("shown.bs.modal", function (e) {
    const modal = $(this);
    const link = $(e.relatedTarget);
    const id = link.data("id");
    const buyer_id = link.data("buyer_id");
    const seller_id = link.data("seller_id");
    const listing_id = link.data("listing_id");
    const transaction_date = link.data("transaction_date");

    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #buyer_id ").val(buyer_id );
    modal.find(".modal-body #seller_id").val(seller_id);
    modal.find(".modal-body #listing_id").val(listing_id);
    modal.find(".modal-body #transaction_date").val(transaction_date);
    modal.find(`.modal-body #transaction_date option[value=${transaction_date}]`).prop('selected', true);


});
$("#edit_favourites").on("shown.bs.modal", function (e) {
    const modal = $(this);
    const link = $(e.relatedTarget);
    const id = link.data("id");
    const user_id= link.data("user_id");
    const listing_id = link.data("listing_id");

    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #user_id").val(user_id);
    modal.find(".modal-body #listing_id").val(listing_id);


});

