String.prototype.capitalizeFirstLetter = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

window.paceOptions = {
    ajax: {
        trackMethods: ['GET', 'POST']
    }
}