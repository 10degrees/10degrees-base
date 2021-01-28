export default function save({ attributes }) {
    const {
        mobileSpacing,
        tabletSpacing,
        desktopSpacing,
        className
    } = attributes;

    return (
        <div className={className}>
            <div class="spacer -mobile-only" style={{height: mobileSpacing + "px"}}></div>
            <div class="spacer -tablet-only" style={{height: tabletSpacing + "px"}}></div>
            <div class="spacer -desktop-only" style={{height: desktopSpacing + "px"}}></div>
        </div>
    );
};