$(function(){
    var baseUrl = $('base').attr('href');
    // Create a model for the services
    var Game = Backbone.Model.extend({

        // These are their default values

        defaults:{
            id: 0,
            html: ''
        },

        requestUrl: baseUrl + '/game/',

        initialize: function(){
            $.ajax({
                type: 'GET',
                url: this.requestUrl + this.get('id'),  // use the same paramtre name as in Controller
                success: function(data) {
                    this.set('html', data);

                    this.trigger('gameCreated');
                },
                error: function(){
                    console.log("request error for id " + this.get('id'));
                },
                context: this
            });
        }
    });

    // Create a collection of services
    var GameList = Backbone.Collection.extend({

        // Will hold objects of the Service model
        model: Game,

        gameIds: [],
        initialize: function(){
            //this.initGameFetching();
        },

        initGameFetching: function() {
            var self = this;
            $.getJSON( baseUrl + "/player/" + playerData.id + "/games/ids/", function( data ) {
                self.gameIds = data.games;
                self.addGame(self.gameIds);
            });
        },

        addGame: function(gameIds) {
            if (!gameIds.length) return false;
            var game = new Game({id: _.first(gameIds)});
            game.on('gameCreated', function() {
                this.addGame(_.rest(gameIds));
            }, this);
            this.add(game);
            game.set('html', '<div class="box" data-id="' + game.get('id') + '"><div class="loader">Loading</div></div>');
        },

        // Return an array only with the checked services
        getGame: function(id){
            return this.where({id:id});
        }
    });

    var games = new GameList();

    // This view turns a Service model into HTML. Will create LI elements.
    var GameView = Backbone.View.extend({
        events:{
            'click': 'toggleService'
        },

        initialize: function(){

            // Set up event listeners. The change backbone event
            // is raised when a property changes (like the checked field)

            this.listenTo(this.model, 'change', this.render);
        },

        render: function(){

            // Create the HTML
            this.setElement(this.model.get('html'));

            // Returning the object is a good practice
            // that makes chaining possible
            return this;
        }
    });

    // The main view of the application
    var App = Backbone.View.extend({

        // Base the view on an existing element
        el: $('body'),

        initialize: function(){

            // Cache these selectors
            this.list = $('.recent .game-box-container');

            // Listen for the change event on the collection.
            // This is equivalent to listening on every one of the 
            // service objects in the collection.
            this.listenTo(games, 'change', this.render);
            // Create views for every one of the services in the
            // collection and add them to the page
            $('#update-games').on('click' , $.proxy(this.updateGamesClickHandler, this));


            games.initGameFetching();
        },

        updateGamesClickHandler: function(event) {
            event.preventDefault();
            games.reset();
            this.list.empty();
            this.list.html('<div class="box" data-id="' + game.get('id') + '"><div class="loader">Loading</div></div>');
            $.ajax({
                type: 'GET',
                url: $(event.currentTarget).attr('href'),
                success: function(data) {
                    //console.log(data);

                    games.initGameFetching();

                    // this.trigger('gameCreated');
                },
                error: function(){
                    console.log("request error for id " + this.get('id'));
                },
                context: this
            });
        },

        render: function(model, options){
            var view = new GameView({ model: model });
            var existingModelDOM = this.list.find('[data-id=' + model.get('id') + ']');

            if (existingModelDOM.length > 0) {
                existingModelDOM.replaceWith(view.render().el);
            } else {
                // this.list.empty();
                this.list.append(view.render().el);
            }

            return this;
        }
    });

    new App();
});