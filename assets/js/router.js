    Airwatch.Router.router = Backbone.Router.extend({

    routes:
    {
        // Call index() function on '/' route
        "": "index"
    },

    initialize: function()
    {
    },

    index: function()
    {
        // Basic route for main page
        // Expects no inputs
        // Loads bookmarks collection and passes it to add & index views
        var collection = new Airwatch.Collections.Bookmarks();
        this.addView = new Airwatch.Views.AddView({ collection: collection });
        this.addView.render();

        // addView's render call is specifically called, but indexView's is not, because the indexView is based on the 
        // return of bookmarks from the server.  AddView will not have to refresh.
        this.indexView = new Airwatch.Views.IndexView({ collection: collection });
    }

});
