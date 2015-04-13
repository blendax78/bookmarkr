Airwatch.Models.Bookmark = Backbone.Model.extend({
    initialize: function()
    {
      // Javascript Model Initialization for a Bookmark.
      // If we have to do any kind of changes to Bookmark properties, this is where to do it.
    },

    url: function()
    {
      // Server endpoint
        return '/bookmarks';
    }
});
