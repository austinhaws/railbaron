import webservice from "../../../app/webservice/Webservice";

export default player => {
    if (confirm(`Are you sure you want to delete '${player.name}'?`)) {
        webservice.player.delete(player.id).then(() => webservice.game.get());
    }
}
