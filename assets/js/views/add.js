Airwatch.Views.AddView = Backbone.View.extend({
    el: '#add-bookmark',

    events: {
        // Declare DOM events for main Add View
        'focusin #add-url': 'expandAdd',
        'blur #add-url': 'reduceAdd',
        'click #add-button': 'addURL'
    },

    initialize: function(options)
    {
        // Set up for Add View
        // Vars: options is an object with properties necessary for this view.
        this.collection = options.collection;
        this.template = ich.add_template({});
    },

    expandAdd: function()
    {
        // Handles event for clicking or tabbing into URL field.
        // Record initial width (this can vary by screen size). If width is set, don't worry about setting it again.
        this.width = this.width || this.$el.find('#add-url').width();

        this.$el.find('#add-url').animate({
            width: '50%'
        }, 500);
    },

    reduceAdd: function()
    {
        // Handles event for clicking or tabbing out of URL field.
        // Return input field to original size.
        this.$el.find('#add-url').animate({
            width: this.width
        }, 500);
    },

    addURL: function(e)
    {
        // Form Handler for adding new Book marks.
        // Vars: Event Object
        e.preventDefault();
        var $form = this.$el.find('#add-form');
        var bookmark = new Airwatch.Models.Bookmark();
        var title = $form.find('#add-title');
        var url = $form.find('#add-url');

        if (url.val().length === 0) {
            alert('Please enter a valid URL.');
            return;
        }

        if (url.val().indexOf('http://') === -1 && url.val().indexOf('https://') === -1) {
            url.val( 'http://' + url.val() );
        }

        bookmark.set('title', title.val());
        bookmark.set('url', url.val() );
        bookmark.set('click_count', 0);
        bookmark.set('status', 0);

        // Sends data to server via REST call
        bookmark.save();

        title.val('');
        url.val('');

        this.collection.add(bookmark);
    },

    render: function()
    {
        // Renders ICanHaz template into DOM
        this.$el.html(this.template);
    }
});
