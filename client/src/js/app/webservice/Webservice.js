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
        get: gamePhrase =>
            graphQLWebservice.query(gameQuery(gamePhrase), webserviceAjaxIds.GAME.GET)
                .then(queryResults('game')),

        startNewGame: (numberPlayers = undefined) =>
            graphQLWebservice.mutation(startNewGameMutation(numberPlayers), webserviceAjaxIds.GAME.START_NEW_GAME)
                .then(queryResults('startNewGame')),
    },

    payout: (city1Id, city2Id) =>
        graphQLWebservice.query(payoutQuery(city1Id, city2Id), webserviceAjaxIds.PAYOUT)
            .then(queryResults('payout')),

    player: {
        delete: (playerId, gamePhrase) =>
            graphQLWebservice.mutation(playerDeleteMutation(playerId, gamePhrase))
                .then(queryResults('deletePlayer')),

        save: (player, gamePhrase) =>
            graphQLWebservice.mutation(playerSaveMutation(player, gamePhrase))
                .then(queryResults('savePlayer')),
    },

    region: {
        get: (regionId = undefined) =>
            graphQLWebservice.query(regionQuery(regionId), webserviceAjaxIds.REGION.GET)
                .then(queryResults('regions')),

        random: () =>
            graphQLWebservice.query(randomRegionQuery(), webserviceAjaxIds.REGION.RANDOM)
                .then(queryResults('randomRegion')),
    },

};
