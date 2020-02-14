import webserviceAjaxIds from "./webserviceAjaxIds";
import graphQLWebservice from "./graphQLWebservice";

export default {
    // dataList: () => graphQLWebservice.query(dataListQuery(), webserviceAjaxIds.DATALISTS).then(data => data.data.dataLists),

    // document: {
    //     deleteDocument: document => graphQLWebservice.mutation(deleteDocumentMutation(document), webserviceAjaxIds.DOCUMENT_DELETE).then(data => data.data.deleteDocument),
    //     getDocumentLink: (provider, document) => graphQLWebservice.query(documentLinkQuery(provider, document), webserviceAjaxIds.DOCUMENT_LINK)
    //         .then(data => data.data.searchPractice[0].documents),
    // },

    game: {
        get: gamePhrase => graphQLWebservice.query(`
                game(phrase: "${gamePhrase}) {
                    phrase
                    players {
                        id
                        name
                        tawColor
                        fromCity {
                            id
                            name
                            region {
                                id
                                name
                            }
                        }
                        toCity {
                            id
                            name
                            region {
                                id
                                name
                            }
                        }
                        homeCity {
                            id
                            name
                            region {
                                id
                                name
                            }
                        }

                    }
                }
            `, webserviceAjaxIds.GAME.GET
        )
            .then(data => data.data.game)
    }
};
