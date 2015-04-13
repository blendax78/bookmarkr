// Declares Javascript 'namespacing' and initializes router
Airwatch = {};
Airwatch.Views = {};
Airwatch.Models = {};
Airwatch.Collections = {};
Airwatch.Router = {};

function init() {
  // Basic Application Initialization.
  Airwatch.Router.router = new Airwatch.Router.router;
  Backbone.history.start();
}

