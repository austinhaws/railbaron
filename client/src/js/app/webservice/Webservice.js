import webserviceAjaxIds from "./webserviceAjaxIds";
import graphQLWebservice from "./graphQLWebservice";
import gameQuery from "../graphql/query/gameQuery";
import startNewGameMutation from "../graphql/mutation/startNewGameMutation";
import cityQuery from "../graphql/query/cityQuery";
import regionQuery from "../graphql/query/regionQuery";

export default {
    city: {
        get: (cityId = undefined) =>
            graphQLWebservice.query(cityQuery(cityId), webserviceAjaxIds.CITY.GET)
                .then(data => data.data.cities),
    },

    game: {
        get: gamePhrase =>
            graphQLWebservice.query(gameQuery(gamePhrase), webserviceAjaxIds.GAME.GET)
                .then(data => data.data.game),

        startNewGame: (numberPlayers = undefined) =>
            graphQLWebservice.mutation(startNewGameMutation(numberPlayers), webserviceAjaxIds.GAME.START_NEW_GAME)
                .then(data => data.data.startNameGame),
    },

    region: {
        get: (regionId = undefined) =>
            graphQLWebservice.query(regionQuery(regionId), webserviceAjaxIds.REGION.GET)
                .then(data => data.data.regions),
    },

};
