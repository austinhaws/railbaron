import webserviceAjaxIds from "./webserviceAjaxIds";
import graphQLWebservice from "./graphQLWebservice";
import gameQuery from "../graphql/query/gameQuery";

export default {
    // dataList: () => graphQLWebservice.query(dataListQuery(), webserviceAjaxIds.DATALISTS).then(data => data.data.dataLists),

    // document: {
    //     deleteDocument: document => graphQLWebservice.mutation(deleteDocumentMutation(document), webserviceAjaxIds.DOCUMENT_DELETE).then(data => data.data.deleteDocument),
    //     getDocumentLink: (provider, document) => graphQLWebservice.query(documentLinkQuery(provider, document), webserviceAjaxIds.DOCUMENT_LINK)
    //         .then(data => data.data.searchPractice[0].documents),
    // },

    game: {
        get: gamePhrase => graphQLWebservice.query(gameQuery(gamePhrase), webserviceAjaxIds.GAME.GET)
            .then(data => console.log(data.data.game) || data.data.game)
    }
};
