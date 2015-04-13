Airwatch.Collections.Bookmarks = Backbone.Collection.extend({
    model: Airwatch.Models.Bookmark,

    initialize: function ()
    {
      // Javascript Collection Initialization for a Bookmarks.
      // If we have to do any kind of changes to Bookmarks properties, this is where to do it.
    },

    comparator: function (bookmark)
    {
        // Whenever sorting or fetch, this function gets called in order to determine collection order.
        // This forces the collection to be sorted by click count, greatest first.
        return -bookmark.get('click_count');
    },

    url: function ()
    {
        // Server endpoint
        return '/bookmarks';
    }
});
