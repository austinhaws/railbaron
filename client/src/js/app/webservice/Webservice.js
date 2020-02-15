import webserviceAjaxIds from "./webserviceAjaxIds";
import graphQLWebservice from "./graphQLWebservice";
import gameQuery from "../graphql/query/gameQuery";
import startNewGameMutation from "../graphql/mutation/startNewGameMutation";

export default {
    game: {
        get: gamePhrase => graphQLWebservice.query(gameQuery(gamePhrase), webserviceAjaxIds.GAME.GET)
            .then(data => data.data.game),

        startNewGame: (numberPlayers = undefined) => graphQLWebservice.mutation(startNewGameMutation(numberPlayers), webserviceAjaxIds.GAME.START_NEW_GAME)
            .then(data => data.data.startNameGame),
    }
};
