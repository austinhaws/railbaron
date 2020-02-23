import webserviceAjaxIds from "./webserviceAjaxIds";
import graphQLWebservice from "./graphQLWebservice";
import gameQuery from "../graphql/query/gameQuery";
import startNewGameMutation from "../graphql/mutation/startNewGameMutation";
import cityQuery from "../graphql/query/cityQuery";
import regionQuery from "../graphql/query/regionQuery";
import payoutQuery from "../graphql/query/payoutQuery";
import randomRegionQuery from "../graphql/query/randomRegionQuery";
import randomCityQuery from "../graphql/query/randomCityQuery";
import playerDeleteMutation from "../graphql/mutation/playerDeleteMutation";
import playerSaveMutation from "../graphql/mutation/playerSaveMutation";
import storeGamePhrase from "../graphql/util/storeGamePhrase";

const queryResults = field => data => data.data[field];

export default {
    city: {
        get: (cityId = undefined) =>
            graphQLWebservice.query(cityQuery(cityId), webserviceAjaxIds.CITY.GET)
                .then(queryResults('cities')),

        random: (regionId = undefined) =>
            graphQLWebservice.query(randomCityQuery(regionId), webserviceAjaxIds.CITY.RANDOM)
                .then(queryResults('randomCity')),
    },

    game: {
        get: (gamePhrase, storeResult = true) =>
            graphQLWebservice.query(gameQuery(gamePhrase), webserviceAjaxIds.GAME.GET)
                .then(queryResults('game'))
                .then(game => storeResult ? storeGamePhrase(game) : game),

        startNewGame: (numberPlayers = undefined) =>
            graphQLWebservice.mutation(startNewGameMutation(numberPlayers), webserviceAjaxIds.GAME.START_NEW_GAME)
                .then(queryResults('startNewGame'))
                .then(storeGamePhrase),
    },

    payout: (city1Id, city2Id) =>
        graphQLWebservice.query(payoutQuery(city1Id, city2Id), webserviceAjaxIds.PAYOUT)
            .then(queryResults('payout')),

    player: {
        delete: playerId =>
            graphQLWebservice.mutation(playerDeleteMutation(playerId))
                .then(queryResults('deletePlayer')),

        save: player =>
            graphQLWebservice.mutation(playerSaveMutation(player))
                .then(queryResults('savePlayer')),
    },

    region: {
        get: (regionId = undefined, includeCities = undefined) =>
            graphQLWebservice.query(regionQuery(regionId, includeCities), webserviceAjaxIds.REGION.GET)
                .then(queryResults('regions')),

        random: () =>
            graphQLWebservice.query(randomRegionQuery(), webserviceAjaxIds.REGION.RANDOM)
                .then(queryResults('randomRegion')),
    },

};
