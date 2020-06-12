export default

MicroModal.init({
    onShow: (modal) => console.info(`${modal.id} is shown`),
    onClose: (modal) => console.info(`${modal.id} is hidden`),
    openTrigger: "data-micromodal-trigger",
    closeTrigger: "data-micromodal-close",
    openClass: "is-open",
    disableScroll: false,
    disableFocus: false,
    awaitOpenAnimation: true,
    awaitCloseAnimation: true,
    debugMode: true,
});