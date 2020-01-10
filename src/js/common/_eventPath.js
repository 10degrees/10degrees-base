/**
 * IE doesn't support event.path property so this function replicates the
 * functionality of it.
 *
 * Returns an array of elements that the event traversed all the way to the Window.
 *
 * @param {Event.target} target The event to get the path of.
 *
 * @return {Array} An array of elements the event propogated through.
 */
const EventPath = ({ target }) => {
    const path = [];
    let currentElem = target;
    while (currentElem) {
        path.push(currentElem);
        currentElem = currentElem.parentElement;
    }
    if (path.indexOf(window) === -1 && path.indexOf(document) === -1)
        path.push(document);
    if (path.indexOf(window) === -1) path.push(window);
    return path;
};

export default EventPath;
