// Get the table of contents element
const tocElement = document.getElementById('toc-element');

// Get all the heading elements in the page

const articleDetails = document.querySelector('.text-details');

const headingElements = articleDetails.querySelectorAll('h1, h2, h3, h4, h5, h6');


// Loop through the heading elements
headingElements.forEach((heading) => {
    // Extract the text and level of the heading
    const text = heading.textContent;
    const level = parseInt(heading.tagName.replace('H', ''), 10);

    const li = document.createElement('li');

    // Create an anchor link for the heading
    const link = document.createElement('a');
    link.textContent = text;
    link.href = `#${heading.id}`;
    li.appendChild(link);

    // Add the anchor link to the table of contents
    tocElement.children[1].appendChild(li);

    // Add a click event listener to the anchor link
    link.addEventListener('click', (event) => {
        event.preventDefault();
        heading.scrollIntoView({
            behavior: 'smooth'
        });
    });
});
