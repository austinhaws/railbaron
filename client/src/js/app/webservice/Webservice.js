import webserviceAjaxIds from "./webserviceAjaxIds";
import graphQLWebservice from "./graphQLWebservice";
import gameQuery from "../graphql/query/gameQuery";
import startNewGameMutation from "../graphql/mutation/startNewGameMutation";
import cityQuery from "../graphql/query/cityQuery";
import regionQuery from "../graphql/query/regionQuery";
import payoutQuery from "../graphql/query/payoutQuery";
import randomRegionQuery from "../graphql/query/randomRegionQuery";
import randomCityQuery from "../graphql/query/randomCityQuery";

export default {
    city: {
        get: (cityId = undefined) =>
            graphQLWebservice.query(cityQuery(cityId), webserviceAjaxIds.CITY.GET)
                .then(data => data.data.cities),

        random: (regionId = undefined) =>
            graphQLWebservice.query(randomCityQuery(regionId), webserviceAjaxIds.CITY.RANDOM)
                .then(data => data.data.randomCity),
    },

    game: {
        get: gamePhrase =>
            graphQLWebservice.query(gameQuery(gamePhrase), webserviceAjaxIds.GAME.GET)
                .then(data => data.data.game),

        startNewGame: (numberPlayers = undefined) =>
            graphQLWebservice.mutation(startNewGameMutation(numberPlayers), webserviceAjaxIds.GAME.START_NEW_GAME)
                .then(data => data.data.startNameGame),
    },

    payout: (city1Id, city2Id) =>
        graphQLWebservice.query(payoutQuery(city1Id, city2Id), webserviceAjaxIds.PAYOUT)
            .then(data => data.data.payout),

    region: {
        get: (regionId = undefined) =>
            graphQLWebservice.query(regionQuery(regionId), webserviceAjaxIds.REGION.GET)
                .then(data => data.data.regions),

        random: () =>
            graphQLWebservice.query(randomRegionQuery(), webserviceAjaxIds.REGION.RANDOM)
                .then(data => data.data.randomRegion),
    },

};
