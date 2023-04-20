// Get the table of contents element
const tocElement = document.getElementById('table-of-contents');

// Get all the heading elements in the page
const headingElements = document.querySelectorAll('h1, h2, h3, h4, h5, h6');

// Loop through the heading elements
headingElements.forEach((heading) => {
    // Extract the text and level of the heading
    const text = heading.textContent;
    const level = parseInt(heading.tagName.replace('H', ''), 10);

    // Create an anchor link for the heading
    const link = document.createElement('a');
    link.textContent = text;
    link.href = `#${heading.id}`;
    link.style.marginLeft = `${(level - 1) * 10}px`;

    // Add the anchor link to the table of contents
    tocElement.appendChild(link);

    // Add a click event listener to the anchor link
    link.addEventListener('click', (event) => {
        event.preventDefault();
        heading.scrollIntoView({
            behavior: 'smooth'
        });
    });
});
