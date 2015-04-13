Airwatch.Views.IndexView = Backbone.View.extend({
    // Main container for Index View
    // NOTE: Backbone Object's save() method automatically sends data back to server via REST call.

    el: '#bookmark-container',

    events:
    {
        // Declare DOM events for main Index View
        'click .link': 'clickLink',
        'click .delete': 'deleteLink'
    },

    initialize: function(options)
    {
        // Set up for Index View
        // Vars: options is an object with properties necessary for this view.
        this.collection = options.collection;
        _.bindAll(this, 'render', 'clickLink', 'deleteLink');
        var _this = this;

        var renderArray = [     
            'sync',
            'change',
            'remove'
        ];

        $.each(renderArray, function(index, value) {
            // Since multiple events call the render() function, we 
            // cycle through an array of events in order to bind them.
            _this.collection.on(value, function() {
                _this.render();
            })
        });

        this.collection.fetch();
    },

    render: function()
    {
        // Renders ICanHaz template and adds it to DOM
        this.collection.sort()
        var template = ich.bookmark_template({ models: this.collection.toJSON() });
        this.$el.html(template);
    },

    deleteLink: function(e)
    {
        // Handles event for clicking on the delete 'icon'
        // Vars: Event object
        e.preventDefault();

        if (confirm('Are you sure you want to delete this?')) {
            var $elem = $(e.currentTarget);
            var bookmark = this.collection.get($elem.data().id);

            bookmark.set('status', 1);
            bookmark.save();

            this.collection.remove(bookmark);
        }
    },

    clickLink: function(e)
    {
        // Handles event for clicking on a URL link
        // Vars: Event object
        e.preventDefault();

        var $elem = $(e.currentTarget);
        var bookmark = this.collection.get($elem.data().id);
        var clicks = bookmark.get('click_count');

        bookmark.set('click_count', clicks + 1);
        bookmark.save();

        // Open clicked URL in new tab/window.
        window.open(bookmark.get('url'), '_blank');
    }
});
