	// if (document.querySelector('.js-starts')) {
	// 	const starContainer	= document.querySelector('.js-starts');
	// 	const stars = document.querySelectorAll('.js-starts a');
	// 	const ratingMessage = document.getElementById('rating-message');


	// 	starContainer.addEventListener('click', (event) => {
	// 		if (event.target.classList.contains('u-star')) {
	// 			event.preventDefault();

	// 			const rating = event.target.getAttribute('data-rating');
	// 			const postId = starContainer.getAttribute('data-post-id');
	// 			const nonce = window.ajax.nonce;

	// 			fetch(`${window.ajax.url}/wp-json/api/v1/rating`, {
	// 				method: 'POST',
	// 				headers: {
	// 					'Content-Type': 'application/json',
	// 					'X-WP-Nonce': nonce,
	// 				},
	// 				body: JSON.stringify({
	// 					rating: rating,
	// 					nonce: nonce,
	// 					id: postId
	// 				}),
	// 			})
	// 			.then(response => response.json())
	// 			.then(data => {
	// 					ratingMessage.textContent = 'Спасибо за ваш голос!';
	// 					starContainer.setAttribute('data-rating', rating);
	// 					starContainer.classList.add('selected');
	// 					stars.forEach(star => {
	// 						star.classList.remove('active');
	// 					});
		
	// 					event.target.classList.add('active');
	// 					console.log(data);
	// 			})
	// 			.catch(error => {
	// 					console.error('Ошибка при отправке рейтинга:', error);
	// 			});
	// 		}
	// 	});
	// }