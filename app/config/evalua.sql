-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2023 at 01:53 AM
-- Server version: 5.7.40-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `role_id`, `status`) VALUES
(1, 'Manuel Perales', 'admin', '', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(2, 'Evaluador', 'evalua', 'asd@2asd.com', 'c754df625da800ca78ffd173068f0b47', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clavesraven`
--

CREATE TABLE `clavesraven` (
  `id` int(2) NOT NULL DEFAULT '0',
  `clave` int(2) NOT NULL DEFAULT '0',
  `counter` int(11) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clavesraven`
--

INSERT INTO `clavesraven` (`id`, `clave`, `counter`, `created`) VALUES
(1, 2, 0, NULL),
(2, 6, 0, NULL),
(3, 5, 0, NULL),
(4, 5, 0, NULL),
(5, 6, 0, NULL),
(6, 5, 0, NULL),
(7, 3, 0, NULL),
(8, 5, 0, NULL),
(9, 1, 0, NULL),
(10, 8, 0, NULL),
(11, 5, 0, NULL),
(12, 6, 0, NULL),
(13, 1, 0, NULL),
(14, 5, 0, NULL),
(15, 2, 0, NULL),
(16, 2, 0, NULL),
(17, 7, 0, NULL),
(18, 5, 0, NULL),
(19, 8, 0, NULL),
(20, 3, 0, NULL),
(21, 7, 0, NULL),
(22, 1, 0, NULL),
(23, 1, 0, NULL),
(24, 8, 0, NULL),
(25, 3, 0, NULL),
(26, 6, 0, NULL),
(27, 2, 0, NULL),
(28, 4, 0, NULL),
(29, 4, 0, NULL),
(30, 6, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coloref`
--

CREATE TABLE `coloref` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL DEFAULT '',
  `name` text NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coloref`
--

INSERT INTO `coloref` (`id`, `code`, `name`, `created`) VALUES
(1, '+0-0', 'Reserva cautelosa, temor de no recibir lo que es debido.', NULL),
(2, '+0-1', 'Tensiones y ansiedad por insatisfacción desasosegada, sin compromiso evidente.', NULL),
(3, '+0-2', 'Tensión originada por causa de fracaso de establecer acuerdos o logros por el esfuerzo.', NULL),
(4, '+0-3', 'Intolerancia por actividad agotadora, agitación irritación y angustia, no participación.', NULL),
(5, '+0-4', 'Decepción de esperanza irrealizadas, ansiedad, voluble y depresivo, reservado.', NULL),
(6, '+0-5', 'Protección por ser confiado, actitud critica y distante.', NULL),
(7, '+0-6', 'Deseo de ser respetado, reprime su sociabilidad, rechaza compromisos y participar.', NULL),
(8, '+0-7', 'Cree su independencia este demasiado restringida, no quiere ser molestado.', NULL),
(9, '+1-1', 'Actitud ambivalente que varia entre felicidad relajada e insatisfacción desosegada.', NULL),
(10, '+1-0', 'Necesita estabilidad y apacibles situaciones para librarse de preocupaciones.', NULL),
(11, '+1-2', 'Tensiones por tratar de manipular situaciones le agotan busca huir de problemas.', NULL),
(12, '+1-3', 'Vitalidad agotada, produce intolerancia,agitación y angustia necesita paz.', NULL),
(13, '+1-4', 'Decepción por esperanzas irrealizadas busca asociación apacible y paz. aprecio.', NULL),
(14, '+1-5', 'Protección por ser demasiado confiado,mal entendido y explotado, busca paz.', NULL),
(15, '+1-6', 'Quiere ser apreciado, busca relación intima, apacible y de estima.', NULL),
(16, '+1-7', 'No desea estar en diferencias de opinión,discordias y discusiones, quiere paz.', NULL),
(17, '+2-2', 'Actitud ambivalentes que varia entre autor realce y deseo de escapar de presiones.', NULL),
(18, '+2-0', 'Tiene miedo le impidan las cosas que quiere, exige reconocimientos y derechos.', NULL),
(19, '+2-1', 'Ansiedad por insatisfacción, o por exigencias trata de escapar mostrando seguridad.', NULL),
(20, '+2-3', 'Vitalidad agotada produce intolerancia, impotencia, frustración,angustia, irritación.', NULL),
(21, '+2-4', 'Decepción y temor de alcanzar objetivos,ansiedad, reconocimiento, valor posición.', NULL),
(22, '+2-5', 'Busca fortalecer su posición, sentido critico, juicio científico, quiere cosas claras.', NULL),
(23, '+2-6', 'Necesita ser considerado y respetado, autoestima alta, se fija normas y metas altas.', NULL),
(24, '+2-7', 'Se opone a influencias externas, toma sus propias decisiones,hace planes y posiciones.', NULL),
(25, '+3-3', 'Actitud ambivalente de salirse con la suya y que lo dejen en paz.', NULL),
(26, '+3-0', 'Temor a que le nieguen lo que quiere lo hace representar papeles febriles.', NULL),
(27, '+3-1', 'Ansiedad e insatisfacción desahogada, trata de escapar con el éxito personal u otras.', NULL),
(28, '+3-2', 'Tensión por manipular los factores fuera de sus posibilidades, poco control, ira.', NULL),
(29, '+3-4', 'Decepción por no poder nuevos objetivos, necesita unión con otros, reacción activa.', NULL),
(30, '+3-5', 'Quiere moverse con libertad pero es coartado pòr por sus bases racionales,definidas.', NULL),
(31, '+3-6', 'Se deleita en la acción, quiere ser respetado y apreciado por sus realizaciones.', NULL),
(32, '+3-7', 'Lucha contra restricciones insiste desarrollarse con su propio esfuerzo.', NULL),
(33, '+4-4', 'Actitud ambivalente ante deseo optimista de realizarse y pesimismo sombrío.', NULL),
(34, '+4-0', 'El temor a que le impidan lo que quiere lo llevan a actividades ilusorias, sin sentido.', NULL),
(35, '+4-1', 'Ansiedad por insatisfacción por irrealizadas,tensión, condiciones y asociación para paz.', NULL),
(36, '+4-2', 'Tensión por manipula factores, culpa a otros, compulsión, confirmación de capacidad.', NULL),
(37, '+4-3', 'Agitación impredecible,irritación, agotamiento intolerancia, ansiedad, escape, amenazas.', NULL),
(38, '+4-5', 'Critico con profundidad de las cosas, busca aclares y explicaciones,orden y método de trabajo.', NULL),
(39, '+4-6', 'Se siente insuficientemente valorado, busca demostrar su valer en diferentes condiciones.', NULL),
(40, '+4-7', 'Se siente coartado e impedido de progresar, busca una solución que le aparte de limitaciones.', NULL),
(41, '+5-5', 'Ambivalencia entre deseo de compañía sin exigencia y desprecio por los que si le dan comprensión.', NULL),
(42, '+5-0', 'Temor a lograr lo que quiere despliega atracción personal para facilitarle las cosas.', NULL),
(43, '+5-1', 'Ansiedad por insatisfacción de circunstancias o sentimentales busca atmósferas tranquilas.', NULL),
(44, '+5-2', 'Tensión por manipular factores, busca sustituir por un mundo ideal o fantasioso por escape.', NULL),
(45, '+5-3', 'Vitalidad agotada produce intolerancia trata de buscar mundo ilusorio para escapar.', NULL),
(46, '+5-4', 'Decepción por nuevos objetivos, busca asociación intima y comprensión huye a un mundo sustituto.', NULL),
(47, '+5-6', 'Se impresiona con la individualidad, originalidad, creatividad.', NULL),
(48, '+5-7', 'Intenta evitar criticas y restricciones sobre su libertad empleo de su atractivo personal.', NULL),
(49, '+6-6', 'Ambivalencia entre seguridad satisfecha y deseo de reconocimiento.', NULL),
(50, '+6-0', 'Temor a restricciones le impulsan a libertad busca estabilidad y ambientes relajados y laxos.', NULL),
(51, '+6-1', 'Ansiedad por irrealizaciones busca seguridad libre de conflictos, exigencias de recuperación.', NULL),
(52, '+6-2', 'Tensión por tratar de manipular,inadecuación personal,trata de refugiarse en ambiente estable.', NULL),
(53, '+6-3', 'Su vitalidad agotada le produce intolerancia trata de huir a ambientes tranquilos y laxos.', NULL),
(54, '+6-4', 'Decepción ante nuevos objetivos, generan ansiedad,falta de asociación intima,huye a otros medios.', NULL),
(55, '+6-5', 'Desea protegerse contra criticas y conflictos recuperar posición, pero muy difícil de complacerse.', NULL),
(56, '+6-7', 'Busca seguridad y posición social en la que no sea molestado ni le impongan cosas.', NULL),
(57, '+7-7', 'Actitud ambivalente individualismo normal y desprecio por el punto de vista de los otros.', NULL),
(58, '+7-0', 'Temor a que se le impida lograr cosas, impulsa tipos de experiencias,desprecio destructivo, futilidad.', NULL),
(59, '+7-1', 'Ansiedad por irrealizaciones,falta de comprensión de los demás impulsan desdeño y desafió.', NULL),
(60, '+7-2', 'Tensión por manipular las cosas, sensación de inadecuación, hiper reacción oposición obstinada.', NULL),
(61, '+7-3', 'Vitalidad agotada produce irritación, intolerancia, indignación resentimiento, siente se victima.', NULL),
(62, '+7-4', 'Decepción por nuevos objetivos,ansiedad, vacío auto desprecio, actitudes obstinadas y desafiadoras.', NULL),
(63, '+7-5', 'Capacidad para examinar con juicio critico, actitud severa, desaprobación, desprecio a los demás.', NULL),
(64, '+7-6', 'Necesidad de estima para sobresalir lo ponen imperativo reacciona para ser centro de atracción.', NULL),
(65, 'x0', 'Compulsión son las características del grupo, sobre protección, egocentrismo, engreimiento.', NULL),
(66, 'x0x1', 'Es relativamente inactivo,conflictos le afectan tranquilidad, poco amistosos, ensimismado.', NULL),
(67, 'x0x2', 'La situación difícil le impide llegar a sus objetivos, encuentra necesario oculta y mostrar.', NULL),
(68, 'x0x3', 'Tiene dificultades para progresar,oculta impulsividad, acciones con problemas, irritable.', NULL),
(69, 'x0x4', 'Falta de realización de sus esperanzas y recuperación le provocan tensión.', NULL),
(70, 'x0x5', 'Temor al desaire y extrema cautela de sus aproximaciones le hacen difícil la intimidad e identificación.', NULL),
(71, 'x0x6', 'Incapaz de esforzarse lo suficiente para lograr objetivos, desea menos problemas.', NULL),
(72, 'x0x7', 'Tensión debido a exigencias de la situación presente, trata de deshacerse de las cosas que le restringen.', NULL),
(73, 'x1', 'Actúa con calma, y con un mínimo de trastorno para manipular,sentirse laxo para llevarse bien.', NULL),
(74, 'x1x0', 'Sensible y comprensivo pero bajo cierta tirantes necesita amistades mas intimas.', NULL),
(75, 'x1x2', 'Actúa de un modo ordenado y metódico Autónomo,busca comprensión empática y aprobación.', NULL),
(76, 'x1x3', 'Trabaja bien en colaboración con los demás pero no es líder, necesita comprensión sin discordias.', NULL),
(77, 'x1x4', 'Complaciente adaptable, se siente incapaz en estar vinculado a alguien de confianza.', NULL),
(78, 'x1x5', 'Sensible necesita entornos estéticos o pareja sensible con quien pueda compartir intimidad.', NULL),
(79, 'x1x6', 'Evita esfuerzos excesivos,necesita seguridad y apacibilidad de amistad segura.', NULL),
(80, 'x1x7', 'Necesita amigos afectuosos pero es intolerante con los que le dan consideraciones.', NULL),
(81, 'x2', 'Persistente exige lo que cree que es debido y se esfuerza por mantener posición intacta.', NULL),
(82, 'x2x0', 'Defensivo cree que su posición esta amenazada,inadecuada, a seguir proyectos a pesar de su ansiedad.', NULL),
(83, 'x2x1', 'Ordenado, metódico y autónomo. Necesita el respeto, el reconocimiento y comprensión de sus íntimos.', NULL),
(84, 'x2x3', 'Autoritario opera en un puesto de autoridad, busca progreso a pesar de la oposición.', NULL),
(85, 'x2x4', 'Trata de mejorar su posición y prestigio, insatisfecho con las circunstancias, necesita estima.', NULL),
(86, 'x2x5', 'Lucha por mejorar su imagen a los ojos de los demás y conseguir estén de acuerdo con el.', NULL),
(87, 'x2x6', 'Trabaja para base firme, para futuro seguro, sin problemas y obtener respeto y reconocimiento.', NULL),
(88, 'x2x7', 'Persigue sus objetivos y su propio interés por una determinación obstinada, rechaza componendas.', NULL),
(89, 'x3', 'Es activo pero juzga que hace progresos limitados y que no es recompensado como debe ser.', NULL),
(90, 'x3x0', 'Impulsivo e irritable, no mide consecuencias y lo llevan a tensión y conflictos.', NULL),
(91, 'x3x1', 'Trabaja bien en equipo, necesita vida de comprensión y sin discordias.', NULL),
(92, 'x3x2', 'Desarrollo de iniciativas, emprende proyectos superando obstáculos, ejerce autoridad y control.', NULL),
(93, 'x3x4', 'Ligero y desenvuelto, no acepta imprevistos sino le crean inconstancia y superficialidad.', NULL),
(94, 'x3x5', 'Participa en todo lo que sea emociones y excitación, se excita con facilidad.', NULL),
(95, 'x3x6', 'No quiere comunicarse con los demás, no hace esfuerzos prefiere comodidad y seguridad antes que recompensas.', NULL),
(96, 'x3x7', 'Se siente obstaculizado, de no conseguir lo que considera fundamental.', NULL),
(97, 'x4', 'Es atraído por todo lo nuevo la aventura lo moderno lo misterioso, se aburre con lo tradicional o rutinario.', NULL),
(98, 'x4x0', 'Busca solución a sus problemas y no encuentra el camino adecuado para los mismos teniendo ansiedad.', NULL),
(99, 'x4x1', 'El ambiente le impacta y lo conmueve, busca relaciones amistosas y apoyo amical.', NULL),
(100, 'x4x2', 'Espera tener posición y prestigio de modo que pueda compensarse con lo que se ha sacrificado.', NULL),
(101, 'x4x3', 'Activo desenvuelto inquieto, se frustra con lo lento, busca lo previsto y persevera en sus objetivos concretos.', NULL),
(102, 'x4x5', 'Imaginativo y sensible busca una salida a sus cualidades busca crear y busca compañía ideal sensible, entusiasmo.', NULL),
(103, 'x4x6', 'Inseguro busca enraizarse estabilizarse, sentimental y concretamente, busca ambientes de tranquilidad.', NULL),
(104, 'x4x7', 'La situación presente se torna peligrosa,busca solución imprevisto en sus decisiones, terco rechaza consejo.', NULL),
(105, 'x5', 'Busca expresar su necesidad de identificación en un atmósfera sensible y compañía que le de protección.', NULL),
(106, 'x5x0', 'Busca unión intima comprensiva en atmósfera personal, intima y compartida ponerse a salvo de conflictos.', NULL),
(107, 'x5x1', 'Busca compartir unión intima y comprensiva en atmósfera de paz, estética y ternura.', NULL),
(108, 'x5x2', 'Lucha para mejorar su imagen y conseguir que lo acepten y estén de acuerdo con sus necesidades.', NULL),
(109, 'x5x3', 'Participa con facilidad en todo lo que lo excite, emociones o estimule.', NULL),
(110, 'x5x4', 'Imaginativo y sensible busca una salida,le gusta lo insólito la aventura,lo misterioso.', NULL),
(111, 'x5x6', 'Sensual se inclina por la satisfacción de sus sentidos rechaza lo vulgar y ordinario.', NULL),
(112, 'x5x7', 'Necesita e insiste en unión intima comprensiva, de manera compulsiva para identificarse.', NULL),
(113, 'x6', 'Se siente ansioso e inseguro, necesita seguridad y ambiente afectuoso para el goce, no se esfuerza.', NULL),
(114, 'x6x0', 'Es incapaz de esforzarse lo suficiente para logra sus objetivos, rezagado busca seguridad.', NULL),
(115, 'x6x1', 'Evita esfuerzos excesivos, necesita enraizarse en seguridad,mal físicamente, necesita trato.', NULL),
(116, 'x6x2', 'Tiene dificultad para hacer frente a las dificultades,considera mucho esfuerzo, soluciones.', NULL),
(117, 'x6x3', 'Progresa con dificultad, no se esfuerza busca condiciones confortables para no tener molestias.', NULL),
(118, 'x6x4', 'Inseguro sin enraizarse, busca estabilizarse, y también sentimentalmente pero no se esfuerza.', NULL),
(119, 'x6x5', 'Sensual, se inclina por la satisfacción fácil y los sentidos también rechaza el mal gusto, lo vulgar y ordinario.', NULL),
(120, 'x6x7', 'Una enfermedad física, una sobretensión, aflicción sentimental le afectan, baja autoestima, busca paz.', NULL),
(121, 'x7', 'Conflictos y problemas de todo tipo necesitan compensación.', NULL),
(122, 'x7x0', 'Insatisfecho,necesidad de escapar de compromisos y problemas, búsqueda de solución.', NULL),
(123, 'x7x1', 'Necesita paz tranquilidad, deseo de intimidad fidelidad, consideración afecto, sino se cierra en depresión.', NULL),
(124, 'x7x2', 'Sus exigencias aun mínimas son imperativas se aferra con seguridad y sin retroceder a lo que busca.', NULL),
(125, 'x7x3', 'Se siente obstaculizado en deseos y necesidades que considera fundamental.', NULL),
(126, 'x7x4', 'La situación presente contiene elementos críticos y peligrosos, necesidad imperiosa de solución.', NULL),
(127, 'x7x5', 'Necesita e insiste en unión intima o al menos comprensiva o método de satisfacer compulsión por ello.', NULL),
(128, 'x7x6', 'Enfermedad física, sobretensión, aflicción sentimental lo han golpeado, necesita recuperase.', NULL),
(129, '+0', 'Renuente a participar agotada en soportar demasiado desea protección y desligarse de todo.', NULL),
(130, '+0+1', 'Exhausto debido a pleitos y discusiones desea estar cubierto, necesita condiciones apacibles y ambiente tranquilo.', NULL),
(131, '+0+2', 'Cree que las circunstancias presentes son hostiles desea estar cubierta ni quiere ninguna oposición para sus planes.', NULL),
(132, '+0+3', 'Tiene exigencias muy grandes sobre la vida, racionaliza quiere impresionar, mostrar logros y encubrir deficiencias.', NULL),
(133, '+0+4', 'Se liberan deseos que generan situaciones insatisfactorias y cargas, busca una salida.', NULL),
(134, '+0+5', 'Relaciones platónicas, ternura atracción, cauta para sus sentimientos se cuida de exteriorizar sus sentimientos y deseos.', NULL),
(135, '+0+6', 'Desea protegerse de todo lo que pueda agotarlo busca una vida segura y llena de bienestar sin problemas o perturbación.', NULL),
(136, '+0+7', 'Cree que ha sido tratado de un modo injusto, inmerecido, traicionado descontento y rebelión por sentir afrentas.', NULL),
(137, '+1', 'Desea un estado de armonio de estado tranquilo, satisfacción serena, pertenencia y apoyo.', NULL),
(138, '+1+0', 'Necesita estar libre de tensiones paz tranquilidad satisfacción.', NULL),
(139, '+1+2', 'Necesita ambientes apacibles, libre de tensiones y desacuerdos, quiere dominar la situación, tacto para detalles.', NULL),
(140, '+1+3', 'Busca relaciones afectivas satisfactorias y armoniosas unión intima con sacrificio y confianza mutua.', NULL),
(141, '+1+4', 'Busca relación que le de felicidad, entusiasta positivo comprensión para los demás.', NULL),
(142, '+1+5', 'Ansia ternura y compartir unión delicada de sentimiento sensible, estético y de buen gusto.', NULL),
(143, '+1+6', 'Desea lugar apacible, sin problemas, seguridad apoyo teme el vacío y la soledad, desea bienestar físico.', NULL),
(144, '+1+7', 'Necesita urgente descanso, reposo, ser comprendido, ansiosos por la situación que es inaguantable, exigencias.', NULL),
(145, '+2', 'Quiere conseguir determinación constancia, pone voluntad, independencia, no quiere oposición si reconocimiento.', NULL),
(146, '+2+0', 'Quiere definir su propia personalidad, influir, sentir que no es apreciado, necesita cambiar apreciación desfavorable.', NULL),
(147, '+2+1', 'Quiere impresionar favorablemente, suspicaz se siente herido, susceptible necesita consideraciones.', NULL),
(148, '+2+3', 'Busca el éxito, quiere superar obstáculos, y oposición persigue objetivos con empeño e iniciativa no es dependiente.', NULL),
(149, '+2+4', 'Necesita el reconocimiento de los demás, ambiciosos quiere impresionar, ser admirado, llenar el vació entre los otros.', NULL),
(150, '+2+5', 'Quiere causar impresión favorable, visto especialmente astuto y táctico para alcanzar objetivos para reconocimiento.', NULL),
(151, '+2+6', 'Tiene la impresión que se le exige demasiado, esto lo hastía y cansa, es orgullosos y condescendiente, quiere seguridad.', NULL),
(152, '+2+7', 'Quiere demostrar a si mismo que puede, no muestra debilidad actúa con austeridad, firmeza autocrático y terco.', NULL),
(153, '+3', ' es una persona activa extrema vital, animada, conquistadora, conseguir éxitos y vivir aventuras.', NULL),
(154, '+3+0', 'Quiere apartar a todos los que le estorban para seguir sus impulsos, conducta impulsiva le hace correr riesgos.', NULL),
(155, '+3+1', 'Se orienta a la vida pletórica, búsqueda de relaciones satisfactorias locuacidad, razonamiento convencimiento.', NULL),
(156, '+3+2', 'Persigue sus objetivos con intensidad y se desvía de su meta, supera obstáculos, se expande para reconocimiento triunfo.', NULL),
(157, '+3+4', 'Busca el éxito e estimulo y vida plena, libertad sociable novedoso receptivo, seguro para no socavar su confianza.', NULL),
(158, '+3+5', 'Busca intensa excitación diversa índole, deben considerarlo interesante, atractivo, se cuida para lograr lo que quiere.', NULL),
(159, '+3+6', 'Desecha su ambición y prestigio, renuncia, prefiere tomar las cosas con calma, ansia de comodidad seguridad, satisfacción.', NULL),
(160, '+3+7', 'Quiere compensar lo que cree ha perdido, quiere librarse de todas las cosas que lo oprimen.', NULL),
(161, '+4', 'Busca cambio de situación que alivie su tensión, solución a nuevas situaciones posibilidad de realizar sus esperanzas.', NULL),
(162, '+4+0', 'Necesita escapatoria de de todo lo que lo oprime, se aferra esperanzas vagas e ilusorias.', NULL),
(163, '+4+1', 'Confía en lazos afectivos y amistades, ayuda a otros, cordial comprensivo receptivo.', NULL),
(164, '+4+2', 'Observador alerta agudo, busca vías de libertad y la oportunidad de sacar máximo provecho, busca reconocimiento.', NULL),
(165, '+4+3', 'Quieres ser más afectivo y tener influencia, desasosiego por búsqueda de deseos y esperanzas, ampliar campo de acción.', NULL),
(166, '+4+5', 'Muy imaginativo inclinado al fantaseo y soñar despierto, ansia aventura y emoción, desea ser admirado.', NULL),
(167, '+4+6', 'Esta desesperado y necesita alivio, quiere bienestar físico, seguridad sin problemas y oportunidad de recuperación.', NULL),
(168, '+4+7', 'Trata de escapar de problemas, tensiones y dificultades por desiciones precipitadas, obstinadas y desconsideradas.', NULL),
(169, '+5', 'Necesita sentirse identificado con alguien y desea ganar el apoyo, trato amable y amigable, sentimental romántico.', NULL),
(170, '+5+0', 'Ansía una compresión sensible y empática; quiere estar a salvo de discusiones, conflictos o tensiones agotadoras.', NULL),
(171, '+5+1', 'Desea ligarse tierna y empáticamente idealizada de armonía, necesidad imperiosa de ternura, afecto, sensible esteta.', NULL),
(172, '+5+2', 'Quiere causar buena impresión, como especial egocéntrico, maneja las cosas para tener influencia, estético original.', NULL),
(173, '+5+3', 'Acepta todo lo que de estimulación, excitación intensa, conquista, atractivo a los demás no deja se ponga en peligro.', NULL),
(174, '+5+4', 'Quiere emoción hechos interesantes, trato agradable, imaginativo en exceso, fantasea y soñar despierto, hacer querer.', NULL),
(175, '+5+6', 'Desea encontrar estimulación en ambientes de sensualidad.', NULL),
(176, '+5+7', 'Imperiosa necesidad de ligazón con alguien que le llene de sensualidad y no entre en conflicto con ella.', NULL),
(177, '+6', 'Busca liberarse de problemas y lograr un estado seguro de bienestar físico en la cual pueda relajarse.', NULL),
(178, '+6+0', 'Necesita con urgencia sosiego y reposo para librarse de conflictos, ansia seguridad, protegido sin problemas.', NULL),
(179, '+6+1', 'Quiere estar satisfecho de bienestar físico, sin conflictos necesita seguridad, no quiere soledad ni separación.', NULL),
(180, '+6+2', 'Se mantiene bajo severo control para no tener crisis o dificultades, necesita seguridad y tranquilidad para recuperar.', NULL),
(181, '+6+3', 'Se mueve por un poderos impulso hacia la sensualidad.', NULL),
(182, '+6+4', 'Juzga que realizar sus expectativas son pocas, entregado a una vida de bienestar sensual.', NULL),
(183, '+6+5', 'Busca la comodidad sensual la entrega a aficiones voluptuosas.', NULL),
(184, '+6+7', 'Se plantea objetivos irrealista ilusorios, decepcionado amargado quiere olvidar y recuperarse de problemas.', NULL),
(185, '+7', 'Considera que las circunstancias presentes son desfavorables, sobre impositivas se niega a recibir consejos.', NULL),
(186, '+7+0', 'Cree que la situación es desesperada rechaza lo desagradable, busca protección, molestias-depresión.', NULL),
(187, '+7+1', 'Sufre con los efectos de las cosas desagradables, rechazo exigencias quiere lo dejen en paz.', NULL),
(188, '+7+2', 'Se opone desconfiado a cualquier clase de restricciones, obstinado en su punto de vista, busca independencia.', NULL),
(189, '+7+3', 'Sufre de una contenida sobrestimulación que amenaza descargarse en abscesos de impulsividad apasionada.', NULL),
(190, '+7+4', 'Trata de escapar de sus problemas y tensiones por decisiones precipitadas, obstinadas y desconsideradas.', NULL),
(191, '+7+5', 'Exige que las ideas y los sentimientos armonicen emerjan y armonicen perfectamente.', NULL),
(192, '+7+6', 'Se plantea objetivos irrealistas, idealistas, ilusorios se ha decepcionado amargamente.', NULL),
(193, '-0', 'Dedicación impaciente- agitación, cree que la vida debe ofrecerle mas, paz solo si logra metas.', NULL),
(194, '-0-1', 'Insatisfacción desasosegada, incapaz de controlar y cambiar las cosas, irritable e impaciente.', NULL),
(195, '-0-2', 'Presión sin resolver, debilitando su tenacidad, sobrecargado y agotado, desorientado pero sigue firme.', NULL),
(196, '-0-3', 'Intento de resistir estimulación, irritabilidad impotente por agitación por logros no realizados.', NULL),
(197, '-0-4', 'Inseguridad aprensiva, tensiones por frustraciones y agitación, esperanzas irrealizadas.', NULL),
(198, '-0-5', 'Tensiones por sensibilidad suprimida, correspondencia controlada, se recrea con el buen gusto pero es critico.', NULL),
(199, '-0-6', 'Suprimido las exigencias orgánicas, situación desagradable, deseo insatisfecho, desea ser amado, exige estima.', NULL),
(200, '-0-7', 'Susceptibilidad acentuada, busca sentido a su vida, se resiente de restricciones, estar desligado, expectativa.', NULL),
(201, '-1', 'Rechaza ponerse laxo darse por vencido mantiene agotamiento y depresión bajo control relación insatisfactoria.', NULL),
(202, '-1-0', 'Muestra impaciencia y ansiedad tiende a estar deprimido falta de realización inquieta no controla la situación, apremio.', NULL),
(203, '-1-2', 'Excesiva tensión que arrolla, intento de superar dificultades, presión que origina tensión y discordia.', NULL),
(204, '-1-3', 'Agitación reprimida relaciones personales no satisfactorias, irritable, ira, neurosis, cardiopatías.', NULL),
(205, '-1-4', 'Decepciones sentimentales dan ansiedad y tensión, conflicto y crisis en relación, actitud fría de respuesta.', NULL),
(206, '-1-5', 'Tensión por falta de comprensión mutua, situación poco satisfactoria, impaciencia por falta de comprensión.', NULL),
(207, '-1-6', 'Insatisfacción sentimental, falta de aprecio la han llevado a una gran tensión, necesidad de comprensión, autocontrol.', NULL),
(208, '-1-7', 'Insatisfacción sentimental deseo de independencia, poca satisfacción imposibilitado de mejorar, no muestra afecto por ello.', NULL),
(209, '-2', 'Tensión que vence la resistencia de la voluntad, sobrecargado agotado.', NULL),
(210, '-2-0', 'Sobrecargado de presiones y tensión, envuelto en problemas sin resolver crean frustración y tensión, desorientado.', NULL),
(211, '-2-1', 'Insatisfacción sentimental, incapacidad para soportar oposición, tensión, frustración, quiere colaboración y escapar.', NULL),
(212, '-2-3', 'Intento de evitar estimulación crea conflictos, siente hostilidad, rechaza el ambiente hostil creído, rebelión impotente.', NULL),
(213, '-2-4', 'Conflicto entre la esperanza y necesidad por desengaño, decepción, irrealización, vacilación frustración.', NULL),
(214, '-2-5', 'Sensación de desprecio e incomprensión, posición desagradable, desanimado quiere huir de situación, humillado.', NULL),
(215, '-2-6', 'Excesivo autodominio al ganar estima y consideración de los demás, necesidad insatisfecha, exigencia, ineficaz estima.', NULL),
(216, '-2-7', 'Frustración derivada de restricciones inaceptables, busca independencia, deseo frustrado de libertad, presión.', NULL),
(217, '-3', 'Intento de resistir cualquier interpretación, agitación reprimida, irritabilidad, cardios, situación amenazadora, incomodo.', NULL),
(218, '-3-0', 'Resistir estimulación provocan agitación reprimida, impaciente errático, agotamiento por agitación, cardios, acosado.', NULL),
(219, '-3-1', 'Resistir estimulación y no relajarse agitación angustia, impaciente irritable y febril, no cordial, desarmonía.', NULL),
(220, '-3-2', 'Impotencia agitada e incapacidad de control, tensión espasmos musculares.', NULL),
(221, '-3-4', 'Tensión por frustración, agitación deseoso de causar buena impresión autodefensa poco realista, se siente victima.', NULL),
(222, '-3-5', 'Tensión a causa de fallar en seguridad y comprensión, no alcanza objetivos, empatía frustrada, experimentador.', NULL),
(223, '-3-6', 'Tensión por frustración nerviosa en el área de los sentimientos. Excesivo autocontrol. se siente poco apreciado.', NULL),
(224, '-3-7', 'Frustraciones por situación difícil, aprisionado, enojado y disgustado, deseo frustrado de independencia.', NULL),
(225, '-4', 'Tensiones por frustración que le han llevado a agitación, pesimismo pérdida de prestigio, inseguridad, no esperanzas.', NULL),
(226, '-4-0', 'Agitada tensión e incertidumbre, oportunidad perdida, tensa expectativa por lo que debe recibir, cree mas de lo real.', NULL),
(227, '-4-1', 'Decepciones sentimentales dan tensión, asociación sentimental con conflicto, decepcionado, depresivo, ambivalencia.', NULL),
(228, '-4-2', 'Tensión por la esperanza y necesidad no cubierta, desengaños, vacilación tirantez, búsqueda de futilidad como salida.', NULL),
(229, '-4-3', 'Tensión por frustración agitado, fracaso perturbador, se siente victima, ideas de culpabilizar.', NULL),
(230, '-4-5', 'Desengaño, susceptibilidad aislamiento, retraimiento, cuida y reserva critica, arrastrado a fantasías, quimeras.', NULL),
(231, '-4-6', 'Tensión que resulta por encubrir la ansiedad bajo capa de confianza, decepción que lo lleva a indiferencia.', NULL),
(232, '-4-7', 'Tensión por decepciones y vigilante autoprotección, cautelosos desconfiado. Reticente a irse con algo.', NULL),
(233, '-5', 'Tensión debida a la supresión de sensibilidad, actitud crítica, se recrea con todo lo agradable, fantasía.', NULL),
(234, '-5-0', 'Muestra impaciencia y agitación, exigente, espera mas, control de asociación, exige sinceridad, correspondencia controlada.', NULL),
(235, '-5-1', 'Rechaza ponerse laxo, darse por vencido, asociación sentimental poco satisfactoria, frustración lo deprime, insatisfacción.', NULL),
(236, '-5-2', 'Sentimiento de desprecios e incomprensiones le dan tensión, posición desagradable, juzga poco valorado, humillado sin aprecio.', NULL),
(237, '-5-3', 'Tensión por no alcanzar seguridad y comprensión, sistema nervioso resentido, frustrante situación necesita comprensión.', NULL),
(238, '-5-4', 'Desengaño lo ha llevado a gran susceptibilidad, aislamiento coartado, retraimiento, decepción sentimental recelo.', NULL),
(239, '-5-6', 'Tensión por no mantener relaciones firmes, en una condición deseable, necesita apoyo de pareja, perspicaz critico, sutil.', NULL),
(240, '-5-7', 'Restricciones molestan tensión, esfuerzo por relaciones sinceras, exige libertada para tomar decisiones, independencia.', NULL),
(241, '-6', 'Tensión por supresión de deseos somáticos, insuficiente consideración por las cuestiones orgánicas, exige estima, fuerte.', NULL),
(242, '-6-0', 'Tensión por supresión de deseos somáticos, deseo de asociarse, quiere ser amado admirado, atención y estima.', NULL),
(243, '-6-1', 'La insatisfacción lo han llevado a una tensión por falta de aprecio, autocontrol excesivo, necesita colaboración.', NULL),
(244, '-6-2', 'Tener por autodominio para ganar consideración, necesidad de asociarse situación incomoda, necesidad de estima.', NULL),
(245, '-6-3', 'Tensión por supresión de deseos somáticos, insuficiente consideración por las necesidades orgánicas aprecio.', NULL),
(246, '-6-4', 'Busca encubrir ansiedad, situación desagradable, solo e inseguro, soledad, desea aprobación y aprecio, indiferencia.', NULL),
(247, '-6-5', 'Se origina tensión por incapacidad de mantener relaciones, sensible, unión, nobleza, erotismo, artístico sublimado, cultura.', NULL),
(248, '-6-7', 'Tensiones que resultan de restricciones, libertad para seguir sus convicciones, aprovechar su oportunidad a su propio sino.', NULL),
(249, '-7', 'Tensión por sentimiento de esfuerzo, ser independiente, busca libertad estar libre de limitaciones busca su propio destino.', NULL),
(250, '-7-0', 'Susceptibilidad para estímulos externos, falta sentido a su existencia integración.', NULL),
(251, '-7-1', 'Insatisfacción sentimental busca independencia con tensión y ansiedad, desequilibrio, susceptibilidad, impaciencia, ansiedad.', NULL),
(252, '-7-2', 'Frustración derivada de restricciones inaceptables a su libertad, desea libertad, gran presión, falta fuerza a propósitos.', NULL),
(253, '-7-3', 'Frustración genera tensión, aprisionado en una situación desagradable, impotente de solución, quiere escapar, defensa nerviosa.', NULL),
(254, '-7-4', 'Tensión que resulta de decepciones, autoprotección para contrariedades, cautela para no fracasar en frustración.', NULL),
(255, '-7-5', 'Tensión por restricciones o limitaciones molestas, sensible, manejable, impresionable, aunque busca independencia compartida.', NULL),
(256, '-7-6', 'Tensiones que resultan de restricciones y limitaciones molestas, resiste presión, exige independencia y perfeccionismo.', NULL),
(257, '=0', 'Aaa', NULL),
(258, '=0=1', 'Sus asociaciones raras veces alcanzan sus expectativas, esto le lleva a desilusionarse, tiende a permanecer aislado sentimentalmente.', NULL),
(259, '=0=2', 'Cree que recibe menos de lo que se merece pero tendra que conformarse y sacar provecho de la situación.', NULL),
(260, '=0=3', 'Se siente indiferente, cercado y ansioso, quiere evitar conflicto con los demás, y tener paz.', NULL),
(261, '=0=4', 'Exigente en relaciones personales, trata de evitar conflicto abierto porque podria interferir con sus ideas.', NULL),
(262, '=0=5', 'Es egocéntrico y por lo tanto fácilmente se siente ofendido.', NULL),
(263, '=0=6', 'Quiere estar vinculado sentimentalmente con alquien.', NULL),
(264, '=0=7', 'Las circunstancias son tales que por el momento se siente forzado a hacer componendas, asi evita la pérdida de afecto.', NULL),
(265, '=1', '', NULL),
(266, '=1=0', 'Tiene grandes exigencias sentimentales y quiere asociación íntima, pero sin profundidad sentimiento.', NULL),
(267, '=1=2', 'Cree que no esta recibiendo lo que se le debe, que no es comprendido ni apreciado, juzga que esta obligado a conformarse.', NULL),
(268, '=1=3', 'Se siente interceptado y desgraciado por las dificultades para conseguir armonía.', NULL),
(269, '=1=4', 'Impositivo en sus exigencias sentimentales, su deseo de independecia le impide asociación profunda.', NULL),
(270, '=1=5', 'Es egocéntrico y por lo tanto fácilmente se siente ofendido.', NULL),
(271, '=1=6', 'Inclinado a retraerse sentimentalmente, lo cual le impide asociarse con profundidad.', NULL),
(272, '=1=7', 'Inhibe sus sentimientos. se siente forzado a hacer componendas, lo cual le dificulta formar vinculos afectivos estables.', NULL),
(273, '=2', '', NULL),
(274, '=2=1', 'Cree que no esta recibiendo lo que se le debe, que no es comprendido ni apreciado, juzga que esta obligado a conformarse.', NULL),
(275, '=2=3', 'Se siente desgraciado por las dificultades que encuentra cuando trata de hacer valer sus derechos.', NULL),
(276, '=2=4', 'Juzga que soporta problemas superior a lo justo, sin embargo permanece firme en sus objetivos y trata de superar dificultades.', NULL),
(277, '=2=5', 'Cree que recibe menos de lo que merece, siente que no hay nadie en quien pueda apoyarse.', NULL),
(278, '=2=6', 'Tiene la impresion que es muy poco mas lo que puede hacer sobre sus problemas y que debe sacar el mejor provecha de las cosas.', NULL),
(279, '=2=7', 'Las circunstancias lo estan forzando a buscar componendas, a frenarse en sus exigencias y algunas de las cosas que quiere.', NULL),
(280, '=3', '', NULL),
(281, '=3=0', 'Esta preocupado con las dificultades, y sin humor para todo tipo de actividad. Necesita paz y tranquilidad.', NULL),
(282, '=3=1', 'Se siente interceptado y desgraciado por las dificultades para conseguir', NULL),
(283, '=3=2', 'Se siente desgraciado por las dificultades que encuentra cuando trata de hacer valer sus derechos, trata de sacar provecho de la situación.', NULL),
(284, '=3=4', 'Quiere ampliar su campo de actividades e insiste en que sus esperanzas e ideas son realistas.', NULL),
(285, '=3=5', 'Se angustia cuando sus necesidades o sus deseos son mal entendidos, cree que no tiene nadie en quien apoyarse,es egocéntrico.', NULL),
(286, '=3=6', 'Se siente atrapado en una situación angustiosa e incómoda, busca el modo de conseguir alivio.', NULL),
(287, '=3=7', 'Las circunstancias son restrictivas y le resultan un impedimento, forzándolo a abstenerse por el momento de algunos placeres.', NULL),
(288, '=4', '', NULL),
(289, '=4=0', 'Exigente en relaciones personales, trata de evitar conflicto abierto porque podria interferir con sus ideas.', NULL),
(290, '=4=1', 'Impositivo en sus exigencias sentimentales, su deseo de independecia le impide asociación profunda.', NULL),
(291, '=4=2', 'Juzga que soporta problemas superior a lo justo, sin embargo permanece firme en sus objetivos y trata de superar dificultades.', NULL),
(292, '=4=3', 'Quiere ampliar su campo de actividades e insiste en que sus esperanzas e ideas son realistas.', NULL),
(293, '=4=5', 'Insiste en que sus esperanzas e ideas son realistas, pero necesita reafimación y ánimo, es egocéntrico.', NULL),
(294, '=4=6', 'Aplica normas muy estrictas para la elección de su pareja.', NULL),
(295, '=4=7', 'Insiste en que sus objetivos son realistas y se aferra con obstinación a ellos.', NULL),
(296, '=5', '', NULL),
(297, '=5=0', 'Quiere estar vinculado sentimentalmente con alguien puesto se siente aislado y solo, es egocéntrico.', NULL),
(298, '=5=1', 'Se siente aislado y solo pero es muy reservado para llegar a formar vínculos,es egocéntrico.', NULL),
(299, '=5=2', 'Cree que recibe menos de lo que merece, siente que no hay nadie en quien pueda apoyarse.', NULL),
(300, '=5=3', 'Se angustia cuando sus necesidades o sus deseos son mal entendidos, cree que no tiene nadie en quien apoyarse,es egocéntrico.', NULL),
(301, '=5=4', 'Insiste en que sus esperanzas e ideas son realistas, pero necesita reafimación y ánimo, es egocéntrico.', NULL),
(302, '=5=6', 'Es egocéntrico, por lo tanto se siente facilmente ofendido, tiende a ser frío sentimentalmente.', NULL),
(303, '=5=7', 'Las condiciones son tales que no se atreven a vincularse íntimamente con alguien sin mantener ciertas reservas mentales.', NULL),
(304, '=6', '', NULL),
(305, '=6=0', 'Quiere estar vinculado sentimentalmente con alquien, trata de evitar conflictos.', NULL),
(306, '=6=1', 'Inclinado a retraerse sentimentalmente, lo cual le impide asociarse con profundidad.', NULL),
(307, '=6=2', 'Tiene la impresion que es muy poco mas lo que puede hacer sobre sus problemas y que debe sacar el mejor provecha de las cosas.', NULL),
(308, '=6=3', 'Se siente atrapado en una situación angustiosa e incómoda, busca el modo de conseguir alivio.', NULL),
(309, '=6=4', 'Aplica normas muy estrictas para la elección de su pareja.', NULL),
(310, '=6=5', 'Es egocéntrico, por lo tanto se siente facilmente ofendido, tiende a ser frío sentimentalmente.', NULL),
(311, '=6=7', 'Las circunstancias lo están forzando a buscar componendas y abstenerse por el momento de algunos placeres.', NULL),
(312, '=7', '', NULL),
(313, '=7=0', 'Las circunstancias son tales que por el momento se siente forzado a hacer componendas, asi evita la pérdida de afecto.', NULL),
(314, '=7=1', 'Inhibe sus sentimientos. se siente forzado a hacer componendas, lo cual le dificulta formar vinculos afectivos estables.', NULL),
(315, '=7=2', 'Las circunstancias lo estan forzando a buscar componendas, a frenarse en sus exigencias y algunas de las cosas que quiere.', NULL),
(316, '=7=3', 'Las circunstancias son restrictivas y le resultan un impedimento, forzándolo a abstenerse por el momento de algunos placeres.', NULL),
(317, '=7=4', 'Insiste en que sus objetivos son realistas y se aferra con obstinación a ellos.', NULL),
(318, '=7=5', 'Las condiciones son tales que no se atreven a vincularse íntimamente con alguien sin mantener ciertas reservas mentales.', NULL),
(319, '=7=6', 'Las circunstancias lo están forzando a buscar componendas y abstenerse por el momento de algunos placeres.', NULL),
(320, 'final_0', 'Egocentrismo, engreimiento, secuela de  sobreprotección, déficit para trabajar en equipo. Necesidad de atención , consideración, susceptibilidad.', NULL),
(321, 'final_1', 'Reflexión,  concentración, sensibilidad  contemplación  también pasividad. Capacidad  de análisis, ternura, inseguridad por excesiva desconfianza.', NULL),
(322, 'final_2', 'Sensibilidad para afectarse trasladando a trastornos gastrointestinales por asunción de  Responsabilidades, cauteloso, defensivo, persistente, posesivo.', NULL),
(323, 'final_3', 'Imperativo, directivo, conquistador con cierta  impulsividad  y “agresivo”. Excitable, excéntrico,  competitivo, emprendedor con autoridad, sensualidad.', NULL),
(324, 'final_4', 'Alegre, disperso, que se proyecta sin medir sus compromisos, amplitud en ideas Activo, entusiasta , positivo , con capacidad de trabajar en equipo, sociable.', NULL),
(325, 'final_5', 'Sensible, susceptible sentimental , idealista fantasioso, susceptible. Sensual. Estético. creativo,  intuitivo, emotivo, cuidadoso y respetuoso, obedece normas.', NULL),
(326, 'final_6', 'Centrado en su salud, posible secuela de enfermedad, facilismo, ocio, visual. Preocupado por su presentación,  cuidado corporal, estético en el vestir.', NULL),
(327, 'final_7', 'Radical, extremo, contestaría, o pasivo agresivo, tendencia a la depresión. Desconfiado, inseguro, incapaz de soportar frustración ni incertidumbre.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conductual`
--

CREATE TABLE `conductual` (
  `id` int(11) NOT NULL,
  `type` smallint(5) UNSIGNED NOT NULL,
  `tid` int(10) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conductual`
--

INSERT INTO `conductual` (`id`, `type`, `tid`, `question`, `created`) VALUES
(1, 1, 1, 'Mi respiración es normal', NULL),
(2, 1, 2, 'Siento que me ahogo y no puedo respirar', NULL),
(3, 1, 3, 'Me sonrojo con facilidad, me pongo colorado', NULL),
(4, 1, 4, 'A veces e rió de chistes groseros', NULL),
(5, 1, 5, 'Mi corazón late fuerte y rápido con frecuencia', NULL),
(6, 1, 6, 'Sufro de gases, de gastritis con frecuencia', NULL),
(7, 1, 7, 'Tengo diarreas, “se me afloja el estomago\"', NULL),
(8, 1, 8, 'Tengo estreñimiento', NULL),
(9, 1, 9, 'Sufro de vómitos o náuseas', NULL),
(10, 1, 10, 'Orino con frecuencia', NULL),
(11, 1, 11, 'Generalmente tengo las manos secas y calientes', NULL),
(12, 1, 12, 'Algunas veces, me enojo, me enfado', NULL),
(13, 1, 13, 'Me suda, me traspira mucho el cuerpo', NULL),
(14, 1, 14, 'Estoy comiendo menos que antes', NULL),
(15, 1, 15, 'Conservo mi peso con frecuencia', NULL),
(16, 1, 16, 'Por las noches me despierto varias veces y pierdo el sueño', NULL),
(17, 1, 17, 'Tengo pesadillas, o sueños que me perturban por las noches', NULL),
(18, 1, 18, 'Al acostarme me quedo dormido fácilmente', NULL),
(19, 1, 19, 'Me despierto cansado, agotado', NULL),
(20, 1, 20, 'Siempre digo la verdad', NULL),
(21, 1, 21, 'La mayor parte del tiempo tengo dolores de cabeza', NULL),
(22, 1, 22, 'Cuando tengo problemas siento adormecimiento y punzadas en algunas partes de mi cuerpo', NULL),
(23, 1, 23, 'A pesar de mis problemas, aún me atraen las personas del sexo opuesto', NULL),
(24, 2, 1, 'Empiezo a sudar y/o temblar cuando paso cerca e algún animal', NULL),
(25, 2, 2, 'Siento algunos miedos y temores', NULL),
(26, 2, 3, 'Respondo con nerviosismo y temor (tiemblo, sudo) ante la presencia de alguna autoridad en clases o en público', NULL),
(27, 2, 4, 'Mis sentimientos los cambio con facilidad', NULL),
(28, 2, 5, 'Ante situaciones imprevistas (temblores o accidentes) actúo con serenidad, con calma', NULL),
(29, 2, 6, 'Lloro con facilidad', NULL),
(30, 2, 7, 'Alardeo, alabo a mi mismo un poco a veces', NULL),
(31, 2, 8, 'Me siento cansado, agotado emocionalmente', NULL),
(32, 2, 9, 'Realizo las tareas difíciles sin ningún temor ni vacilación', NULL),
(33, 2, 10, 'Me reciento y me encolerizo con facilidad', NULL),
(34, 2, 11, 'Me río sin motivo alguno cuando estoy nervioso, tenso', NULL),
(35, 2, 12, 'Cuando estoy con problemas, los evito, no me gusta enfrentarlos', NULL),
(36, 2, 13, 'Tengo autocontrol de mis emociones y sentimientos', NULL),
(37, 2, 14, 'Algunas veces (cuando no me siento  bien) estoy malhumorado', NULL),
(38, 2, 15, 'Antes de ingresar a una reunión, examen o una exposición, río, siento náuseas y/o ganas de ir al baño', NULL),
(39, 2, 16, 'Tengo miedo de ser censurado, criticado, rechazado o ignorado', NULL),
(40, 2, 17, 'Con frecuencia puedo expresar mis emociones', NULL),
(41, 2, 18, 'Con frecuencia puedo expresar mis pensamientos', NULL),
(42, 2, 19, 'Algunas veces siento deseos de maldecir', NULL),
(43, 2, 20, 'Con frecuencia puedo manifestar mis comportamientos', NULL),
(44, 2, 21, 'Mis sentimientos son fác9ilmente heridos', NULL),
(45, 2, 22, 'Con frecuencia me siento deprimido, triste, melancólico sin causa justificada', NULL),
(46, 2, 23, 'siento como si me estuviera deshaciendo en pedazos', NULL),
(47, 3, 1, 'Ante situaciones y/u objetos  temidos siempre me aproximo o acerco a ellos', NULL),
(48, 3, 2, 'Evito aproximarme a personas temidas', NULL),
(49, 3, 3, 'Evito asumir responsabilidades', NULL),
(50, 3, 4, 'Con frecuencia agarro o tomo cosas u objetos que no me pertenecen', NULL),
(51, 3, 5, 'Cuando niño hacia siempre inmediatamente lo que me decían sin refunfuñar, ni renegar', NULL),
(52, 3, 6, 'Mis músculos están frecuentemente relajados, livianos', NULL),
(53, 3, 7, 'Trabajo más lento que la mayoría de la gente de mi edad y sexo', NULL),
(54, 3, 8, 'Permanezco sentado muy poco  tiempo estando en clase o una reunión', NULL),
(55, 3, 9, 'A veces he intentado atentar contra mi vida', NULL),
(56, 3, 10, 'Respondo con agresión física y/o verbal en una discusión(golpeo)', NULL),
(57, 3, 11, 'A veces he llegado tarde a una cita o a  mi trabajo', NULL),
(58, 3, 12, 'Con frecuencia pierdo el equilibrio al caminar', NULL),
(59, 3, 13, 'Tengo impulsos de romper o destrozar las cosas', NULL),
(60, 3, 14, 'Con frecuencia tartamudeo en una conversación', NULL),
(61, 3, 15, 'Tengo dolores de espalda', NULL),
(62, 3, 16, 'Mis ojos están frecuentemente sin parpadear intensamente', NULL),
(63, 3, 17, 'Hablo más lento que la mayoría de la gente', NULL),
(64, 3, 18, 'Se me paralizan los brazos y piernas', NULL),
(65, 3, 19, 'Se me hace más fácil ganar que perder un juego', NULL),
(66, 3, 20, 'Mis pies están frecuentemente quietos, calmados sin temblar', NULL),
(67, 3, 21, 'Tengo disminución o pérdida de mi tono de voz', NULL),
(68, 3, 22, 'Tengo parálisis facial', NULL),
(69, 3, 23, 'Me lavo las manos a cada rato, una y otra vez', NULL),
(70, 4, 1, 'Cuando me presentan a una persona no sé cómo empezar una conversación con ella', NULL),
(71, 4, 2, 'Me cuesta trabajo conversar con extraños', NULL),
(72, 4, 3, 'Solicito permiso cuando es necesario hacerlo', NULL),
(73, 4, 4, 'Todas mis costumbres o hábitos son buenos y correctos', NULL),
(74, 4, 5, 'Generalmente solicito ayuda cuando lo necesito', NULL),
(75, 4, 6, 'Me cuesta trabajo perdonar fácilmente', NULL),
(76, 4, 7, 'Con frecuencia doy instrucciones que los demás siguen fácilmente', NULL),
(77, 4, 8, 'Sé convencer a tras personas que mis ideas son mejores y más útiles que las de ellos', NULL),
(78, 4, 9, 'Cuando alguien me  necesita o requiere ayuda no sé como hacerlo', NULL),
(79, 4, 10, 'Prefiero trabajar solo en un lugar de integrar grupos', NULL),
(80, 4, 11, 'Me es difícil divertirme en una fiesta alegre', NULL),
(81, 4, 12, 'Declararía siempre todo a la aduana, aún sabiendo que nunca seria descubierto', NULL),
(82, 4, 13, 'Conduzco y organizo a los grupos en forma adecuada', NULL),
(83, 4, 14, 'Mis padres deciden siempre lo que yo debo hacer', NULL),
(84, 4, 15, 'Prefiero que las ordenes y decisiones sean tomadas por otras personas', NULL),
(85, 4, 16, 'Generalmente me preocupa estar bien arreglado y aseado', NULL),
(86, 4, 17, 'Algunas veces converso de cosas que conozco y no sé nada', NULL),
(87, 4, 18, 'El aportar ideas al grupo me parece muy importante', NULL),
(88, 4, 19, 'Con frecuencia trato de planificar mis tareas anticipadamente', NULL),
(89, 4, 20, 'Me resulta fácil fijarme metas de manera realista', NULL),
(90, 4, 21, 'Cuando discuto con alguien, generalmente no me interesa llegar a un acuerdo', NULL),
(91, 4, 22, 'Cuando estoy frente a una persona que está enojada, colérica, me pongo nervioso(a) y no sé qué hacer', NULL),
(92, 4, 23, 'Cuando alguien hace algo que no e gusta, por lo general no se lo hago saber', NULL),
(93, 5, 1, 'Con frecuencia impongo mis ideas sobre las ideas de los demás', NULL),
(94, 5, 2, 'Me gusta que las cosas se hagan como yo las ordeno', NULL),
(95, 5, 3, 'Cuando alguien me pide algo, me cuesta trabajo decirle “no”', NULL),
(96, 5, 4, 'Critico a veces a los demás', NULL),
(97, 5, 5, 'Me es difícil tolerar lo errores a los demás', NULL),
(98, 5, 6, 'Por ningún motivo cambiara  mi rutina diaria', NULL),
(99, 5, 7, 'En ningún momento acepto que mis ideas sean cuestionadas', NULL),
(100, 5, 8, 'Prefiero vivir una vida feliz', NULL),
(101, 5, 9, 'Considero que la ciencia es el mejor medio para lograr una vida justa y de bienestar', NULL),
(102, 5, 10, 'Creo que los demás estarían mejor si yo muriera', NULL),
(103, 5, 11, 'Si fallo como pareja, esto significa que soy una persona inadecuada', NULL),
(104, 5, 12, 'Percibo que mi conducta es controlada por otras personas', NULL),
(105, 5, 13, 'De vez en cuando pienso en cosas demasiado malas para hablar de ellas', NULL),
(106, 5, 14, 'Para mi, el futuro es promisorio, alentador', NULL),
(107, 5, 15, 'Si yo ganara más dinero trabajando, podría obtener todas las cosas que quiero', NULL),
(108, 5, 16, 'Tengo ideas fijas, permanentes, para terminar la tarea que estoy haciendo', NULL),
(109, 5, 17, 'Pienso permanentemente en la comida, o en la limpieza o el orden', NULL),
(110, 5, 18, 'Me parece que demuestro ser poco hábil', NULL),
(111, 5, 19, 'Soy tan agradable como debería ser', NULL),
(112, 5, 20, 'Estoy libre de prejuicios de cualquier tipo', NULL),
(113, 5, 21, 'Desearía ser más digno de confianza', NULL),
(114, 5, 22, 'Debería depositar mayor confianza en mi familia', NULL),
(115, 5, 23, 'Por lo general, me agrada todo aquel que conozco', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(2) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `controller` varchar(32) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `display` int(11) DEFAULT NULL,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `created`, `controller`, `action`, `display`, `description`) VALUES
(1, 'Test de Temperamento', NULL, 'Personalidad', 'personalidad', 1, NULL),
(2, 'Test de Intereses Vocacionales', NULL, 'Vocacional', 'vocacional', 1, NULL),
(3, 'Test de Razonamiento Lógico', NULL, 'Clavesraven', 'coeficiente', 1, NULL),
(4, 'Test de Personalidad por Colores', NULL, 'Coloref', 'colores', 1, NULL),
(5, 'Test de Aptitudes Basicas Laborales ', NULL, 'Laboral', 'laboral', 1, NULL),
(6, 'Test Dimensional de la Personalidad ', NULL, 'Conductual', 'conductual', 1, NULL),
(8, 'Test Factorial de la Personalidad', NULL, 'Eynseck', 'seck', 1, NULL),
(9, ' Test de Competencias Personales', NULL, 'tepetes', 'tepete', 1, NULL),
(10, 'Test de Competencias Personales (VC)', '2020-08-01 00:00:00', 'tepetes', 'tepete/mini', 1, NULL),
(11, 'Test Dimensional de la Personalidad (VC)', '2020-08-01 00:00:00', 'conductual', 'conductual/mini', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eynseck`
--

CREATE TABLE `eynseck` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `yes` char(1) NOT NULL,
  `no` char(1) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eynseck`
--

INSERT INTO `eynseck` (`id`, `question`, `yes`, `no`, `created`) VALUES
(1, '¿Es Ud. más distante y reservado que la mayoría de la gente?', '', 'E', NULL),
(2, '¿Encuentra difícil realizar actividades algunas mañanas?', 'N', '', NULL),
(3, '¿La mayoría de las cosas le da lo mismo a Ud.?', 'P', '', NULL),
(4, '¿Si Ud. dice que hará algo, siempre mantiene su promesa sin importar que tan inconveniente pudiera ser hacerlo?', 'L', '', NULL),
(5, '¿Le divierte ir a fiestas?', 'E', '', NULL),
(6, '¿Puede usualmente ordenar sus ideas?', '', 'N', NULL),
(7, '¿Le divierte hacer daño a la gente?', 'P', '', NULL),
(8, '¿A veces Ud . pierde la calma y se molesta?', '', 'L', NULL),
(9, '¿Haría Ud. casi cualquier cosa por un desafío?', 'E', '', NULL),
(10, '¿Alguna vez ha tenido miedo de perder la razón?', 'N', '', NULL),
(11, '¿Goza Ud. generalmente de buena salud?', '', 'P', NULL),
(12, '¿Ocasionalmente Ud. tiene pensamientos que preferiría que otras personas no los conozcan?', '', 'L', NULL),
(13, '¿Le es divertido cazar, pescar o practicar algo?', 'E', '', NULL),
(14, '¿Muchas veces sueña despierto?', 'N', '', NULL),
(15, '¿Fue o es su madre una buena mujer?', '', 'P', NULL),
(16, '¿Todos sus hábitos son buenos y deseables?', 'L', '', NULL),
(17, '¿Casi siempre tiene una respuesta rápida cuando la gente le habla?', 'E', '', NULL),
(18, '¿Le es difícil mantener la atención en lo que está haciendo?', 'N', '', NULL),
(19, '¿Considera Ud. que tiene más problemas que la mayoría de la gente?', 'P', '', NULL),
(20, '¿Algunas veces chismosea?', '', 'L', NULL),
(21, '¿Es Ud. vivaz?', 'E', '', NULL),
(22, '¿A veces está Ud. sin ganas de comer?', 'N', '', NULL),
(23, '¿Le preocupa mucho adquirir alguna enfermedad?', 'P', '', NULL),
(24, '¿Declararía siempre todos sus impuestos, aún si supiera que no puede ser descubierto?', 'L', '', NULL),
(25, '¿Le gusta mucho el bullicio y excitación a su alrededor?', 'E', '', NULL),
(26, '¿A menudo se siente saciado?', 'N', '', NULL),
(27, '¿Le gusta mezclarse con la gente?', 'E', '', NULL),
(28, '¿Ha tenido mucha mala suerte?', 'P', '', NULL),
(29, '¿Alguna vez ha llegado tarde a una cita o trabajo?', '', 'L', NULL),
(30, '¿Se siente deprimido por las mañanas?', 'N', '', NULL),
(31, '¿Hay mucha gente que trata de evitarlo?', 'P', '', NULL),
(32, '¿De toda la gente que conoce hay alguien que definitivamente a Ud. no le gusta?', '', 'L', NULL),
(33, '¿Se considera una persona de buena suerte?', 'E', '', NULL),
(34, '¿Cambia su estado de ánimo frecuentemente?', 'N', '', NULL),
(35, '¿Permite que sus sueños le adviertan o guíen?', 'P', '', NULL),
(36, '¿A veces habla de cosas que desconoce?', '', 'L', NULL),
(37, '¿Puede Ud. usualmente ir y disfrutar de una fiesta gay?', 'E', '', NULL),
(38, '¿A veces siente que no le importa lo que le suceda?', 'N', '', NULL),
(39, '¿Piensa que hay alguien que es responsable de la mayoría de sus problemas?', 'P', '', NULL),
(40, '¿De niño hacía siempre lo que le decían?', 'L', '', NULL),
(41, '¿Le gusta tener personas a su alrededor?', 'E', '', NULL),
(42, '¿Se siente miserable sin ninguna buena razón?', 'N', '', NULL),
(43, '¿Considera que la gente se ofende con facilidad?', 'P', '', NULL),
(44, '¿A veces se enoja?', '', 'L', NULL),
(45, '¿Le gusta salir mucho?', 'E', '', NULL),
(46, '¿A menudo se preocupa por sentimientos de culpa?', 'N', '', NULL),
(47, '¿Tomaría drogas de efectos extraños y peligrosos?', 'P', '', NULL),
(48, '¿A veces se ríe de chistes groseros?', '', 'L', NULL),
(49, '¿Le gusta hacer bromas?', 'E', '', NULL),
(50, '¿Siente compasión por sí mismo?', 'N', '', NULL),
(51, '¿Ama Ud. a su madre?', '', 'P', NULL),
(52, '¿Está Ud. libre de prejuicios de toda clase?', 'L', '', NULL),
(53, '¿Normalmente prefiere estar sólo?', '', 'E', NULL),
(54, '¿Le preocupa mucho su apariencia?', 'N', '', NULL),
(55, '¿Tiene enemigos que desean hacerle daño?', 'P', '', NULL),
(56, '¿A veces alardea?', '', 'L', NULL),
(57, '¿Le es difícil mostrar sus sentimientos?', '', 'E', NULL),
(58, '¿A menudo se siente débil para todo?', 'N', '', NULL),
(59, '¿Sus amistades se rompen sin que esto sea por culpa suya?', 'P', '', NULL),
(60, '¿Contesta una carta personal tan pronto como pueda, después de haberla leído?', 'L', '', NULL),
(61, '¿Es Ud. comunicativo?', 'E', '', NULL),
(62, '¿A veces se siente fastidiado por dentro?', 'N', '', NULL),
(63, '¿Cree que la gente dice y hace cosas para fastidiarlo?', 'P', '', NULL),
(64, '¿A veces deja para mañana lo que debe hacer hoy?', '', 'L', NULL),
(65, '¿De niño le gustaban los juegos bruscos?', 'E', '', NULL),
(66, '¿Se considera diferente a los demás?', 'N', '', NULL),
(67, '¿Fue o es su padre un buen hombre?', '', 'P', NULL),
(68, '¿A veces ha dicho mentiras?', '', 'L', NULL),
(69, '¿Le gusta contar chistes o historias graciosas a sus amigos?', 'E', '', NULL),
(70, '¿A veces a deseado estar muerto?', 'N', '', NULL),
(71, '¿Habría Ud. tenido más éxito si la gente no hubiera puesto dificultades en su camino?', 'P', '', NULL),
(72, '¿Preferiría ganar que perder un juego?', '', 'L', NULL),
(73, '¿Hace fácilmente amigos con miembros de su propio sexo?', 'E', '', NULL),
(74, '¿Usualmente trabaja para obtener recompensa?', 'N', '', NULL),
(75, '¿Le hace sentir mal ver a u niño o animal sufrir?', '', 'P', NULL),
(76, '¿Cuándo hace nuevos amigos, Ud. usualmente toma alguna iniciativa?', 'E', '', NULL),
(77, '¿Cuándo está en lugares de mucha gente, te preocupa los peligros de infección?', 'N', '', NULL),
(78, '¿A veces las cosas le parecen como si no fueran reales?', 'P', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laboral`
--

CREATE TABLE `laboral` (
  `id` int(3) NOT NULL DEFAULT '0',
  `question` text NOT NULL,
  `yes` tinyint(1) NOT NULL DEFAULT '0',
  `no` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laboral`
--

INSERT INTO `laboral` (`id`, `question`, `yes`, `no`, `created`) VALUES
(1, '¿Le gusta  música o actividad  a su alrededor?', 0, 0, NULL),
(2, 'Preferiría preparar el plan de una actividad que tomar parte en ella.', 1, 0, NULL),
(3, 'Más de una vez ha tomado la dirección o el mando organizando un proyecto o un grupo de personas', 1, 0, NULL),
(4, 'Casi siempre recibe todo el reconocimiento o elogios que usted merece por las cosas que hace', 1, 0, NULL),
(5, 'Preferiría quedarse en su casa leyendo que asistir a una gran fiesta nocturna', 1, 0, NULL),
(6, 'Tienes a menudo un sentimiento de intranquilidad, como si quisieras algo pero sin saber que.', 0, 0, NULL),
(7, 'Está  de acuerdo en que uno debería comer Beber y divertirse con frecuencia', 0, 1, NULL),
(8, 'Cuando descubre que algo que ha comprado tiene defectos, duda en exigir la devolución del dinero.', 0, 1, NULL),
(9, 'Cuando trabaja en equipo usted participa usted activamente en todo.', 1, 0, NULL),
(10, 'Frecuentemente usted trata de analizar los motivos que tienen los demás.', 0, 1, NULL),
(11, 'Tienes casi siempre una contestación lista, o a la mano, cuando la gente le habla', 0, 0, NULL),
(12, 'La gente piensa que usted tiende a ser muy serio', 1, 0, NULL),
(13, 'En un encuentro inesperado con alguien que no conoce, usted espera a que él se presente primero.', 0, 1, NULL),
(14, 'La gente habla mal de usted a sus espaldas', 0, 1, NULL),
(15, 'Le resulta fácil actuar o portarse con naturalidad esté en donde esté.', 1, 0, NULL),
(16, '¿Te siente algunas veces feliz, algunas veces triste, sin una razón real?', 0, 0, NULL),
(17, 'Le gusta que las reuniones a las que asiste serán muy animadas.', 0, 1, NULL),
(18, 'Si tiene una opinión muy diferente a la expresada por un conferencista usted se lo dirá ,antes o después que  termine .', 1, 0, NULL),
(19, 'Con frecuencia otras personas le culpan o critican por cosas que usted no ha hecho.', 0, 1, NULL),
(20, 'Le gustan los trabajos o tareas que requieren poner atención en muchos detalles.', 1, 0, NULL),
(21, '¿Te enfadas a veces?', 0, 0, NULL),
(22, 'Suele detenerse a pensar demasiado antes de actuar', 1, 0, NULL),
(23, 'Usted evita discutir sobre un precio con un empleado o un vendedor.', 0, 1, NULL),
(24, 'Frecuentemente se aburre cuando el tema de conversación se aparta de sus experiencias o aficiones.', 0, 1, NULL),
(25, 'Habitualmente está demasiado ocupado como para emplear su tiempo en reflexiones o meditaciones.', 0, 1, NULL),
(26, '¿Cuándo te meten en una pelea, la enfrentas y prefieres “sacar los trapos al aire”, de una vez por todas?', 0, 0, NULL),
(27, 'Le gusta los trabajos que requieren poner mucha atención en los detalles.', 1, 0, NULL),
(28, 'Cuando actúa en grupo, prefiere dejar que algún otro tome la dirección de las actividades.', 0, 1, NULL),
(29, 'Es usted muy susceptible o quisquilloso en algunas cosas.', 0, 1, NULL),
(30, 'Está más interesado en los deportes que en cosas intelectuales.', 0, 1, NULL),
(31, '¿Has perdido a menudo el sueño por tus preocupaciones?', 0, 0, NULL),
(32, 'Se le puede considerar un individuo alegre y despreocupado', 0, 1, NULL),
(33, '¿Cuándo una persona no juega limpio duda usted en decirle algo sobre eso?', 0, 1, NULL),
(34, 'Con frecuencia siente que uno de los protagonistas de la película o de una obra teatral es como usted.', 0, 1, NULL),
(35, 'Ha hecho una norma o regla de vida el evaluar cuidadosamente todas sus acciones pasadas.', 1, 0, NULL),
(36, '¿Te gusta mezclarte con la gente?', 0, 0, NULL),
(37, '¿Usted toma la vida muy en serio?', 1, 0, NULL),
(38, 'Lo pasaría bien presentándose personalmente a solicitar trabajo.', 1, 0, NULL),
(39, 'Se ve metido en líos sin buscarlos, es decir sin que usted haya hecho nada para provocarlos', 0, 1, NULL),
(40, '¿Tiene inclinación hacia la filosofía, es decir, tiende a filosofar sobre las cosas.', 1, 0, NULL),
(41, '¿Te decides a menudo demasiado tarde?', 0, 0, NULL),
(42, 'Frecuentemente está usted anhelando emociones o diversiones', 0, 1, NULL),
(43, 'Le asusta  la idea de dar un discurso', 0, 1, NULL),
(44, 'Dedica mucho tiempo a pensar sobre usted mismo.', 0, 1, NULL),
(45, 'A menudo esta tan “abstraído en su pensamiento” como ausente', 1, 0, NULL),
(46, '¿Cuándo niño (a) hacías siempre inmediatamente lo que te decían, sin refunfuñar?', 0, 0, NULL),
(47, 'Algunas veces tomas decisiones rápidas que más tarde lamenta haber tomado tan precipitadamente', 0, 1, NULL),
(48, 'Le resulta difícil y molesto pedir a la gente dinero u otro tipo de donaciones.', 0, 1, NULL),
(49, 'Se recupera muy rápidamente de una experiencia humillante', 1, 0, NULL),
(50, 'Le gusta discutir con sus amigos las cuestiones más serias y fundamentales de la existencia.', 1, 0, NULL),
(51, '¿Cuándo sus padres, un profesor o un superior le reprenden, le entran ganas de llorar.', 0, 0, NULL),
(52, 'Tiene la costumbre de empezar cosas y después perder el interés en ellas', 0, 1, NULL),
(53, 'Cuando niño, muchos de sus compañeros de juego daban por hecho que usted sería el cabecilla o jefe.', 1, 0, NULL),
(54, 'La mayoría de las cosas que suceden le parece que tienen alguna relación con usted.', 0, 1, NULL),
(55, 'Con frecuencia le gusta conocer las razones fundamentales de las acciones de las personas', 1, 0, NULL),
(56, '¿Te consideras a ti mismo (a) como despreocupado (a) o confiado (a) a tu buena ventura?', 0, 0, NULL),
(57, 'Le es difícil entender a la gente que se preocupa demasiado', 0, 1, NULL),
(58, 'Cuando el empleado de una tienda atiende a otros que llegaron después  de usted, protesta sobre eso.', 1, 0, NULL),
(59, 'Ciertas personas deliberadamente dicen o hacen cosas para molestarlo', 0, 1, NULL),
(60, 'Algunas veces tiene la extraña o peculiar sensación de que ha cambiado y no es como era antes', 0, 1, NULL),
(61, '¿Te gusta trabajar sola (o)?', 0, 0, NULL),
(62, 'Muchos de sus amigos opinan que toma su trabajo demasiado en serio', 1, 0, NULL),
(63, 'Duda en circular en medio de una reunión cuando sabe que va a llamar la atención y todos los ojos van a estar sobre usted.', 0, 1, NULL),
(64, 'Hay muchos tipos de trabajo que ni pensaría hacer porque no son bastantes buenos para usted', 0, 1, NULL),
(65, 'Usted goza analizando problemas difíciles de resolver', 1, 0, NULL),
(66, '¿Te has sentido a menudo apático (a) y cansado (a) sin razón?', 0, 0, NULL),
(67, 'Usted toma decisiones bajo el impulso del momento', 0, 1, NULL),
(68, 'Cuando se encuentra en apuros o dificultades, usted es bastante hábil alardeando o fanfarroneando ( es decir aparentando más seguridad en sí mismo de la que en realidad tiene para salir del paso?', 1, 0, NULL),
(69, 'La gente le ofende o hiere sin darse cuenta porque usted oculta sus sentimientos', 0, 1, NULL),
(70, 'Frecuentemente suele tomarse algo de tiempo para meditar sobre las cosas', 1, 0, NULL),
(71, '¿Te ríes a veces por chistes groseros?', 0, 0, NULL),
(72, 'Frecuentemente actúa con la primera idea que le viene a la cabeza', 0, 1, NULL),
(73, 'Cuando ve un accidente se apresura a tomar parte activa de los trabajos de socorro', 1, 0, NULL),
(74, 'Ha tenido la impresión de que ciertas personas trataban secretamente de sacarle ventaja o provecho', 0, 1, NULL),
(75, 'Le parece muy interesante observar a la gente para ver lo que hará', 1, 0, NULL),
(76, 'Te sientes incomodo con vestidos que no son de “diario”.', 0, 0, NULL),
(77, 'Le gusta hacer bromas a los demás', 0, 1, NULL),
(78, 'Usted toma la iniciativa animando una fiesta o reunión.', 1, 0, NULL),
(79, 'Con mucha frecuencia busca concejo de otras personas.', 0, 1, NULL),
(80, 'Busca constantemente la forma de perfeccionarse o mejorarse a si mismo.', 1, 0, NULL),
(81, 'Se siente herido fácilmente en sus sentimientos.', 0, 0, NULL),
(82, 'Usted es un individuo que vive sin mayores preocupaciones y confiado en la suerte', 0, 1, NULL),
(83, 'Cuando en un restaurante le sirvan una comida mala o de inferior la acepta sin protestar .', 0, 1, NULL),
(84, 'Resulta difícil herir sus sentimientos', 1, 0, NULL),
(85, 'Usted busca evitar problemas que exijan reflexión constante', 0, 1, NULL),
(86, 'A menudo le gusta salir a la calle o estar con gente.', 0, 0, NULL),
(87, 'Está usted tan preocupado por el futuro, que no  goza el presente como podría hacerlo', 0, 1, NULL),
(88, 'Cuando se siente atraído por una persona hace todo lo posible para llegar a conocerla .', 1, 0, NULL),
(89, 'Le ha sucedido en algunos momentos la idea de que alguien le está leyendo sus pensamientos.', 0, 1, NULL),
(90, 'Usted trata de captar lo que los demás están pensando mientras hablan con usted', 1, 0, NULL),
(91, 'Usted toma la iniciativa animando una reunión aburrida.', 0, 0, NULL),
(92, 'Frecuentemente se pone a analizar sus pensamientos y sentimientos', 1, 0, NULL),
(93, 'En las reuniones interviene en voz alta y decidida para oponerse a quienes usted está seguro que están equivocados.', 1, 0, NULL),
(94, 'Ha sido seriamente menospreciado más de una vez', 0, 1, NULL),
(95, 'Después de que ha pasado un momento crítico o importante generalmente se pone a pensar en ello.', 0, 1, NULL),
(96, '¿Estas completamente libre de perjuicios?', 0, 0, NULL),
(97, 'Le resulta difícil entender como pueden algunas personas ser  tan despreocupadas acerca de su futuro', 1, 0, NULL),
(98, 'Le gusta vender cosas es decir actuar como un vendedor', 1, 0, NULL),
(99, 'Demasiado a menudo otras personas se atribuyen el mérito o reciben elogios por cosas que usted a hecho', 0, 1, NULL),
(100, 'Está muy preocupado por las costumbres de su generación', 1, 0, NULL),
(101, 'Puedes participar y hablar sin problemas en una conferencia.', 1, 0, NULL),
(102, 'Puedes expresar en palabras fácilmente lo que piensas', 0, 1, NULL),
(103, 'Te abstraes (te pierdes en tus pensamientos) a menudo.', 1, 0, NULL),
(104, '¿Te gusta conversar y hacer bromas?.', 1, 0, NULL),
(105, 'Dejas algunas cosas para mañana pudiendo hacerlas hoy.', 0, 1, NULL),
(106, '¿Buscas saludar o contestas  alegremente un saludo y conversas con quien te encuentras en la calle.', 0, 1, NULL),
(107, '¿Cuándo te fastidias o tienes problemas  buscas algun amigo para hablar de ello?.', 1, 0, NULL),
(108, '¿Te molesta vender cosas o pedir dinero a la gente para alguna buena causa?', 1, 0, NULL),
(109, 'Se siente muy mal si alguien critica y no aprueba la ropa que lleva puesta', 0, 1, NULL),
(110, 'Respetas siempre las reglas de transito o esperas el  verde para cruzar  una esquina con semáforo.', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personalidad`
--

CREATE TABLE `personalidad` (
  `id` int(3) NOT NULL DEFAULT '0',
  `question` text NOT NULL,
  `yes` char(1) NOT NULL DEFAULT '',
  `no` char(1) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personalidad`
--

INSERT INTO `personalidad` (`id`, `question`, `yes`, `no`, `created`) VALUES
(1, '¿Te gusta abundancia de excitacion y bullicio a tu alrededor?', 'E', '', NULL),
(2, '¿Tienes a menudo un sentimiento de intranquilidad ,como si quisieras algo pero sin saber porqué?', 'N', '', NULL),
(3, '¿Tienes casi siempre una constetación casi lista, \"a la mano\",cuando la gente te habla?', 'E', '', NULL),
(4, '¿Te sientes algunas veces feliz, algunas veces triste, sin una razo real?', 'N', '', NULL),
(5, '¿Permaneces usualmente retraido(a) en fiestas y reuniones?', '', 'E', NULL),
(6, '¿Cuando niño(a) hacías siempre inmediatamente lo que te decían, sin refunfuñar?', 'L', '', NULL),
(7, '¿Te enfadas a veces?', 'N', '', NULL),
(8, '¿Cuándo te meten en una pelea, prefieres \"sacar los trapos al aire\", de una vez por todas?', 'E', '', NULL),
(9, '¿Eres tú triste, melancólico?', 'N', '', NULL),
(10, '¿Te gusta mezclarte con la gente?', 'E', '', NULL),
(11, '¿Has perdido a menudo el sueño por tus preocupaciones?', 'N', '', NULL),
(12, '¿Se enoja a veces?', '', 'L', NULL),
(13, '¿Te consideras a ti mismo(a) como despreocupado(a) o confiado(a) a tu buena ventura?', 'E', '', NULL),
(14, '¿Te decides a menudo demasiado tarde?', 'N', '', NULL),
(15, '¿Te gusta trabajar solo(a)?', '', 'E', NULL),
(16, '¿Te has sentido a menudo apático(a) y cansado(a) sin razón?', 'N', '', NULL),
(17, '¿Eres, por el contrario, animado(a) y jovial?', 'E', '', NULL),
(18, '¿Te ríes a veces por chistes groseros?', '', 'L', NULL),
(19, '¿Te sientes a menudo hastiado(a)?', 'N', '', NULL),
(20, '¿Te sientes incómodo(a) con vestidos que no son del diario?', '', 'E', NULL),
(21, '¿Te distres (vaga tu mente) a menudo cuando tratas de prestar atención a algo?', 'N', '', NULL),
(22, '¿Puedes expresar en palabras fácilmente lo que piensas?', 'E', '', NULL),
(23, '¿Te abstraes(te pierdes en tus pensamientos) a menudo?', 'N', '', NULL),
(24, '¿Estás completamente libre de prejuicios de cualquier tipo?', 'L', '', NULL),
(25, '¿Te gustan las bromas?', 'E', '', NULL),
(26, '¿Piensas a menudo en tu pasado?', 'N', '', NULL),
(27, '¿Te gusta mucho la buena comida?', 'E', '', NULL),
(28, '¿Cúando te fastidias, necesitas de algún(a) amigo(a) para hablar de ello?', 'N', '', NULL),
(29, '¿Te molesta vender cosas o pedir dinero a la gente para alguna causa buena?', '', 'E', NULL),
(30, '¿Alardeas (te jactas) un poco a veces?', '', 'L', NULL),
(31, '¿Eres muy susceptible por algunas cosas?', 'N', '', NULL),
(32, '¿Te gusta más quedarte en casa que ir a una fiesta aburrida?', '', 'E', NULL),
(33, '¿Te pones a menudo tan inquieto(a) que no puedes permanecer sentado(a) durante mucho rato en una silla?', 'N', '', NULL),
(34, '¿Te gusta planear las cosas cuidadosamente con mucha anticipación?', '', 'E', NULL),
(35, '¿Tienes a menudo mareo (vértigo)?', 'N', '', NULL),
(36, '¿Cóntestas siempre una carta personal tan pronto como puedes despues de haberla leído?', 'L', '', NULL),
(37, '¿Haces usualmente las cosas mejor resolviéndolas solo(a) que hablando a otra persona sobre ellas?', '', 'E', NULL),
(38, '¿Te falta frecuentemente aire sin haber haber hecho trabajo pesado?', 'N', '', NULL),
(39, '¿Eres una persona tolerante, que generalmente no se molesta si las cosas no están perfectas?', 'E', '', NULL),
(40, '¿Sufres de los nervios?', 'N', '', NULL),
(41, '¿Te gustaría más planear cosas que hacer cosas?', '', 'E', NULL),
(42, '¿Dejas algunas veces cosas para mañana que deberías hacer hoy?', '', 'L', NULL),
(43, '¿Te pones nervioso(a) en lugars tales como ascensores, trenes o túneles?', 'N', '', NULL),
(44, '¿Cúando haces nuevos amigos, ers tú generalmente quien inicia la relación o invita a que se produzca?', 'E', '', NULL),
(45, '¿Sufres de dolores de cabeza?', 'N', '', NULL),
(46, '¿Sientes generalmente que las cosas se arreglarán por sí solas y que terminarán bien de algún modo?', 'E', '', NULL),
(47, '¿Te cuesta trabajo coger el sueño al acostarte por las noches?', 'N', '', NULL),
(48, '¿Has dicho alguna vez mentiras en tu vida?', '', 'L', NULL),
(49, '¿Algunas veces dices lo primero que se te viene a la cabeza?', 'E', '', NULL),
(50, '¿Te preocupas durante un tiempo demasiado largo después de una experiencia embarazosa?', 'N', '', NULL),
(51, '¿Te mantienes generalmente hermético(a) o encerrado(a) en ti mismo(a), excepto con amigos muy íntimos?', '', 'E', NULL),
(52, '¿A menudo te creas problemas por hacer cosas sin pensar?', 'N', '', NULL),
(53, '¿Te gustan los chistes y referir historias chistosas a tus amigos?', 'E', '', NULL),
(54, '¿Se te hace más facil ganar que perder un juego?', 'L', '', NULL),
(55, '¿Te sientes a menudo demasiado consciente de ti mismo(a) o poco natural cuando estás con superiores?', 'N', '', NULL),
(56, '¿Cuando todas las probabilidades están contra ti, generalmente piensas que aún vale la pena probar suerte?', 'E', '', NULL),
(57, '¿Sientes \"sensaciones raras\" en el abdomen antes de algún hecho importante?', 'N', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `push`
--

CREATE TABLE `push` (
  `id` int(11) NOT NULL,
  `start_time` int(11) DEFAULT NULL,
  `last_time` int(11) DEFAULT NULL,
  `vars1` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `push`
--

INSERT INTO `push` (`id`, `start_time`, `last_time`, `vars1`) VALUES
(1, 1599337459, NULL, '{\"an\":\"ya29.c.KoiE_XsfEu_s3KeRQ\",\"expires_in\":3599,\"token_type\":\"Bearer\"}');

-- --------------------------------------------------------

--
-- Table structure for table `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `completed` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `vars1` text,
  `vars2` text,
  `vars3` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resultados`
--

INSERT INTO `resultados` (`id`, `user_id`, `exam_id`, `created`, `completed`, `duration`, `vars1`, `vars2`, `vars3`) VALUES
(1, 2, 1, '2020-07-30 05:59:41', 1, NULL, '{\"N\":2,\"E\":5,\"L\":1}', NULL, NULL),
(6, 2, 4, '2020-08-01 06:26:41', 1, NULL, '{\"colors1\":[\"5\",\"3\",\"0\",\"4\",\"9\",\"6\",\"2\",\"1\",\"8\",\"7\"],\"colors2\":[\"7\",\"1\",\"2\",\"5\",\"8\",\"3\",\"0\",\"9\",\"4\",\"6\"]}', NULL, NULL),
(7, 1, 3, '2020-08-01 06:28:56', 1, NULL, '{\"total\":11}', NULL, NULL),
(8, 2, 2, '2020-08-01 06:39:09', 1, NULL, '{\"17\":19,\"16\":18,\"11\":17,\"1\":16,\"2\":16}', NULL, NULL),
(9, 2, 5, '2020-08-01 07:03:19', 1, NULL, '{\"R\":8,\"A\":9,\"O\":12,\"T\":6,\"I\":0}', NULL, NULL),
(11, 2, 6, '2020-08-01 07:11:44', 1, NULL, '{\"1\":{\"suma\":35,\"L\":0},\"2\":{\"suma\":27,\"L\":1},\"3\":{\"suma\":25,\"L\":0},\"4\":{\"suma\":32,\"L\":2},\"5\":{\"suma\":28,\"L\":0},\"L\":3}', NULL, NULL),
(12, 2, 8, '2020-08-01 07:21:56', 1, NULL, '{\"P\":10,\"N\":9,\"E\":7,\"L\":3}', NULL, NULL),
(14, 2, 9, '2020-08-25 21:21:57', 1, NULL, '{\"1\":11,\"2\":17,\"3\":14,\"4\":10,\"5\":16,\"6\":17,\"7\":11,\"8\":10,\"9\":12,\"10\":17,\"11\":12,\"12\":13,\"13\":15,\"14\":17,\"15\":18,\"16\":19}', NULL, NULL),
(15, 1, 11, '2020-08-26 05:16:45', 1, NULL, '{\"1\":{\"suma\":15,\"L\":0},\"2\":{\"suma\":17,\"L\":0},\"3\":{\"suma\":9,\"L\":1},\"4\":{\"suma\":9,\"L\":0},\"5\":{\"suma\":17,\"L\":0},\"L\":1}', NULL, NULL),
(17, 2, 10, '2020-08-26 05:21:57', 1, NULL, '{\"1\":14,\"2\":13,\"3\":18,\"4\":10,\"16\":11}', NULL, NULL),
(18, 2, 11, '2020-08-26 16:06:35', 1, NULL, '{\"1\":{\"suma\":19,\"L\":0},\"2\":{\"suma\":15,\"L\":0},\"3\":{\"suma\":14,\"L\":0},\"4\":{\"suma\":16,\"L\":0},\"5\":{\"suma\":11,\"L\":0},\"L\":0}', NULL, NULL),
(19, 1, 3, '2020-08-27 05:49:57', 1, 25, '{\"total\":11}', NULL, NULL),
(20, 1, 3, '2020-08-27 05:51:06', 1, 60, '{\"total\":10}', NULL, NULL),
(21, 2, 3, '2020-08-27 05:52:12', 1, 126, '{\"total\":10}', NULL, NULL),
(22, 2, 4, '2020-08-29 08:19:43', 1, 14, '{\"colors1\":[6,0,9,3,8,4,7,5,1,2],\"colors2\":[0,9,1,2,7,5,3,8,6,4]}', NULL, NULL),
(23, 6, 11, '2021-07-05 23:22:16', 1, 96, '{\"1\":{\"suma\":18,\"L\":0},\"2\":{\"suma\":15,\"L\":0},\"3\":{\"suma\":19,\"L\":0},\"4\":{\"suma\":20,\"L\":0},\"5\":{\"suma\":22,\"L\":0},\"L\":0}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secciones`
--

INSERT INTO `secciones` (`id`, `created`, `name`) VALUES
(1, NULL, 'DESAJUSTE'),
(2, NULL, 'ANSIEDAD'),
(3, NULL, 'DEPRESIÓN'),
(4, NULL, 'TOLERANCIA AL ESTRÉS'),
(5, NULL, 'AUTOCONCEPTO'),
(6, NULL, 'TOLERANCIA Y FLEXIBILIDAD'),
(7, NULL, 'ADAPTACIÓN A LOS CAMBIOS'),
(8, NULL, 'INTERÉS POR OTRAS CULTURAS'),
(9, NULL, 'DISPONIBILIDAD'),
(10, NULL, 'INTELIGENCIA SOCIAL'),
(11, NULL, 'INTEGRACIÓN SOCIAL'),
(12, NULL, 'TRABAJO EN EQUIPO'),
(13, NULL, 'AUTOEXIGENCIA PROFESIONAL'),
(14, NULL, 'DINAMISMO'),
(15, NULL, 'TESÓN Y CONSTANCIA'),
(16, NULL, 'SINCERIDAD');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `exam_id`, `created`, `name`, `value`, `description`) VALUES
(1, 1, '2020-07-01 00:00:00', 'colerico', 'Es tal su vez su nota más distintiva el deseo de actividad exuberante: una necesidad vital de hacer algo y esto de \r\nun modo impulsivo. No se siente satisfecho si no es una ocupación donde pueda descargar su ímpetu vital. \r\nEs combativo, proselitista, persuasivo en sumo grado y entusiasta; emprendedor, de gran iniciativa. Por lo general, \r\noptimista y alegre aunque pasa fácilmente y con rapidez de unos sentimientos a otros, su gran emotividad le suministra \r\ncontinuamente entusiasmo y fogosidad para el desarrollo de sus actividades. Muchas veces esa actitud es febril, \r\nsin gran constancia en una misma dirección ni profundidad en su trabajo. Sus sentimientos son abundantes, fuertes \r\nexpansivos de sumo grado.', NULL),
(2, 1, '2020-07-01 00:00:00', 'colerico_d', '<b>Positivo:</b> Reactivo, integrado, lider para grupo de estudio, optimista emprendedor.<br />\r\n<b>Negativo:</b> Necesita autocontrol para mantener atención y concentración, pierde los\r\nobjetivos, su caracter es su enemigo', NULL),
(3, 1, '2020-07-01 00:00:00', 'flematico', 'Presenta una personalidad vigorosamente estructurada, con un fondo muy rico de energía activa. \r\nNo tiene sentimientos intensos, pero si constancia y tenacidad en la acción, rara vez violento y sobreestimulado.\r\n Hombre sin grandes pasiones, se mantiene en constante tranquilidad efectiva; muy paciente y poco hablador, \r\n cuando se comunica lo hace con medida y casi nunca elevando la voz. Reduce al mínimo las manifestaciones de afecto,\r\n dando muchas veces la sensación de frialdad.', NULL),
(4, 1, '2020-07-01 00:00:00', 'flematico_d', '<b>Positivo:</b> Buen control para el estudio, especial para tareas largas si esta motivado, sereno y facilidad\r\npara resolver problemas<br />\r\n<b>Negativo:</b> Rigido, lento, terco y con postergacion constante, si no esta motivado\r\npareciera inconstante.', NULL),
(5, 1, '2020-07-01 00:00:00', 'melancolico', 'Abundancia de sentimientos sujetos a una gran variabilidad. En un momento recorre toda su vasta gama emotiva \r\nsin que ello deje huella duradera. Por lo mismo, su vitalidad es tumultosa: poco coherente y ordenada. Este y\r\n la excitabilidad, le dan la apariencia de una impulsividad grande, pero todas estas impresiones e ímpetus no \r\n llegan a cristalizarse casi nunca en su realidad afectiva. Su vida, subjetiva, rica y compleja es lo que más \r\n atrae su interés. Hombres de problemas interiores y tensiones, intensos goces, y sufrimientos que suceden unos \r\n tras otros y le hacen pensar mucho en si mismo.', NULL),
(6, 1, '2020-07-01 00:00:00', 'melancolico_d', '<b>Positivo:</b> Facilidad para el estudio de ciencias y matematicas y lecturas. Analítico\r\n, trabaja aislado y planificado, investigado.<br />\r\n<b>Negativo:</b> Baja tolerancia a la presión, frustración y grandes retos, se pierde\r\no deja por ansiedad.', NULL),
(7, 1, '2020-07-01 00:00:00', 'sanguineo', 'Abundancia de sentimientos y sensaciones que no son profundos ni intensos y suceden unos a otros con gran rapidez. \r\nNo puede estar inactivo aunque suele ser constante en continuar lo comenzado. Generalmente esta siempre alegre, \r\nsonriente, muy locuaz, de viva y animada charla. Amigo de exagerar, hacer ruido de la imaginación, Tiene frecuente \r\nsentimiento de afabilidad, benevolencia y admiración por los demás. Socialmente atento y cortés, gusta del compañerismo\r\n y las amistades. Ama la libertad; en política y religión no se apasiona, en general sus pasiones no son fuertes. Suele \r\n tener disposición para la música y gusto en los deportes.', NULL),
(8, 1, '2020-07-01 00:00:00', 'sanguineo_d', '<b>Positivo:</b> Capacidad para tareas largas, interesado, dado a tareas manipulativas y\r\nverbales, sociable en grupo.<br />\r\n<b>Negativo:</b> Muy confiado, no asume responsabilidades, pareciera inmaduro', NULL),
(9, 4, '2020-08-01 00:00:00', 'color_0', '#eff0ba', NULL),
(10, 4, '2020-08-01 00:00:00', 'color_1', '#0B27A1', NULL),
(11, 4, '2020-08-01 00:00:00', 'color_2', '#025C43', NULL),
(12, 4, '2020-08-01 00:00:00', 'color_3', '#D93B0B', NULL),
(13, 4, '2020-08-01 00:00:00', 'color_4', '#F6D703', NULL),
(14, 4, '2020-08-01 00:00:00', 'color_5', '#720159', NULL),
(15, 4, '2020-08-01 00:00:00', 'color_6', '#903F00', NULL),
(16, 4, '2020-08-01 00:00:00', 'color_7', '#000000', NULL),
(17, 4, '2020-08-01 00:00:00', 'color_8', '#65676C', NULL),
(18, 4, '2020-08-01 00:00:00', 'color_9', '#ffffff', NULL),
(19, 1, '2020-08-01 00:00:00', 'colerico_e', 'Energetico Emprendedor', NULL),
(20, 1, '2020-08-01 00:00:00', 'melancolico_e', 'Analitico Reflexivo', NULL),
(21, 1, '2020-08-01 00:00:00', 'sanguineo_e', 'Sociable Comunicativo', NULL),
(22, 1, '2020-08-01 00:00:00', 'flematico_e', 'Apoyador Responsable', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tepetes`
--

CREATE TABLE `tepetes` (
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `question` text NOT NULL,
  `clave` varchar(10) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `signo` int(11) DEFAULT NULL,
  `seccion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tepetes`
--

INSERT INTO `tepetes` (`id`, `created`, `question`, `clave`, `puntaje`, `signo`, `seccion_id`) VALUES
(1, NULL, 'Cuando algo no se resuelve, no me siento mal, sino que insisto hasta encontrar una solución', 'C', 2, 1, 15),
(2, NULL, 'Me siento vulnerable a las críticas de los demás', 'B', 2, 0, 5),
(3, NULL, 'Si se diera el caso, acudiría sin reparos a una manifestación contra el racismo', 'B', 1, 1, 11),
(4, NULL, 'Cuando no me apetece hacer una cosa, cualquier excusa me sirve', 'A', 3, 0, 9),
(5, NULL, 'Me molestan cierto tipo de pensamientos extraños', 'A', 0, 1, 1),
(6, NULL, 'Me molesta que la vida esté cambiando tan rápidamente', 'C', 1, 0, 7),
(7, NULL, 'Al irme a dormir suele haber algún pensamiento que me preocupa', 'B', 1, 1, 3),
(8, NULL, 'Me aburren los documentales sobre otras culturas', 'A', 3, 0, 8),
(9, NULL, 'Soy capaz de conseguir que los demás cambien de opinión', 'B', 1, 1, 10),
(10, NULL, 'Me gusta más empezar cosas nuevas que llevarlas a cabo', 'A', 3, 0, 15),
(11, NULL, 'Me atraen la vida y costumbres de otros pueblos', 'A', 0, 1, 8),
(12, NULL, 'Me da igual que todo el mundo sepa que he fallado en mi trabajo', 'A', 3, 0, 13),
(13, NULL, 'Si la hora de viajar se retrasa, lo tomo con paciencia y tranquilidad', 'A', 3, 0, 2),
(14, NULL, 'Si me llegan varios problemas a la vez me siento mal y no sé qué hacer', 'A', 3, 0, 4),
(15, NULL, 'En mi entorno social o familiar se habla mal de mí', 'A', 0, 1, 1),
(16, NULL, 'Me siento inferior cuando hablo con una persona de mayor rango o nivel que yo', 'A', 3, 0, 4),
(17, NULL, 'Mantengo la confianza en mí cuando las cosas se ponen difíciles', 'C', 2, 1, 5),
(18, NULL, 'Acepto sin rechistar las órdenes que provienen de mis superiores', 'B', 2, 0, 16),
(19, NULL, 'Me empeño al máximo en conseguir lo que me propongo', 'C', 2, 1, 13),
(20, NULL, 'En mi vida están ausentes esas experiencias extrañas que tienen ciertas personas', 'A', 3, 0, 1),
(21, NULL, 'Soy estricto con mi horario laboral para poder disfrutar con mi familia y amigos', 'D', 3, 1, 13),
(22, NULL, 'Evito los análisis médicos rutinarios por si me encuentran algo', 'A', 0, 1, 1),
(23, NULL, 'Cuando trabajo en equipo, si no se me hace caso me enfado considerablemente', 'B', 2, 0, 12),
(24, NULL, 'Si veo a alguien en apuros hago lo posible por ayudarle', 'D', 3, 1, 9),
(25, NULL, 'Me fío poco de los otros', 'B', 2, 0, 12),
(26, NULL, 'Sé cómo tratar a la gente', 'C', 2, 1, 11),
(27, NULL, 'Suelo estar muy fatigado al acabar la jornada laboral', 'B', 2, 0, 14),
(28, NULL, 'Me molesta no poder terminar algo que he empezado', 'D', 0, 0, 15),
(29, NULL, 'Cuando no sé hacer algo busco la ayuda de un compañero', 'B', 1, 1, 10),
(30, NULL, 'Me cuesta congeniar con alguien a quien constantemente le asaltan las dudas y no es capaz de tomar una decisión', 'C', 1, 0, 6),
(31, NULL, 'Cuando me incorporo a una reunión me intereso por la conversación y trato de participar en ella', 'D', 3, 1, 11),
(32, NULL, 'Prefiero trabajar lentamente y sin presión', 'B', 2, 0, 4),
(33, NULL, 'Todo lo nuevo me encanta', 'B', 2, 0, 16),
(34, NULL, 'Cuando he trabajado en equipo he procurado compartir mis puntos de vista', 'C', 2, 1, 12),
(35, NULL, 'En una reunión prefiero que sean los demás quienes hablen', 'B', 2, 0, 11),
(36, NULL, 'Uno de mis lemas es: \'Piensa mal y acertarás\'', 'A', 0, 1, 3),
(37, NULL, 'Mis sueños suelen tener un tono relajante o amable', 'B', 2, 0, 3),
(38, NULL, 'Si se produce una situación de emergencia, mantengo la calma y serenidad', 'C', 1, 0, 2),
(39, NULL, 'Cuando me enfado puedo ser muy desagradable', 'C', 2, 1, 2),
(40, NULL, 'Me molesta mucho faltar al trabajo cuando estoy enfermo', 'D', 0, 0, 16),
(41, NULL, 'Me molesta que surjan imprevistos que hagan cambiar mis planes', 'C', 1, 0, 7),
(42, NULL, 'Si lo que hago me llega a producir tensión me pongo a hacer otra cosa', 'B', 2, 0, 4),
(43, NULL, 'Hay épocas en que, sin razón aparente, me siento más animado que de costumbre', 'B', 1, 1, 3),
(44, NULL, 'Cuando voy al cine u otro espectáculo no soporto tener que esperar la cola', 'B', 2, 0, 4),
(45, NULL, 'Cuando me comprometo a algo, hago todo lo posible por cumplirlo', 'D', 3, 1, 13),
(46, NULL, 'Los fracasos reiterados me dejan desanimado', 'A', 3, 0, 15),
(47, NULL, 'Las emociones forman parte de mi comportamiento normal', 'C', 2, 1, 4),
(48, NULL, 'Evito asumir más trabajo hasta que termine lo que tengo entre manos', 'B', 2, 0, 9),
(49, NULL, 'Me produce cierta envidia ver triunfar a alguien similar a mí', 'B', 1, 1, 16),
(50, NULL, 'Cuando veo un accidente me siento mal y me alejo', 'C', 2, 1, 2),
(51, NULL, 'Por las mañanas me levanto lleno de energía y vitalidad', 'C', 2, 1, 14),
(52, NULL, 'Me resulta difícil marcarme objetivos ambiciosos y conseguirlos', 'A', 3, 0, 13),
(53, NULL, 'SI no congenio con alguien la primera vez que le veo, pienso que otro día podría ir mejor', 'D', 3, 1, 10),
(54, NULL, 'Vivo tranquilo ante lo que pueda pasar en el futuro', 'B', 1, 1, 7),
(55, NULL, 'Me gustan los retos nuevos porque estimulan mi iniciativa', 'B', 1, 1, 7),
(56, NULL, 'Critico a las personas informales o incumplidoras', 'C', 1, 0, 6),
(57, NULL, 'Me gusta gozar del afecto de todo el mundo', 'B', 2, 0, 16),
(58, NULL, 'Me cuesta trabajar muchas horas seguidas, necesito descansar de vez en cuando', 'A', 3, 0, 14),
(59, NULL, 'Cuando me desplazo al trabajo o a otro lugar muy conocido por mí, me gusta hacer el mismo recorrido cada día', 'B', 2, 0, 7),
(60, NULL, 'En los trabajos de grupo me implico con todos los integrantes', 'B', 1, 1, 12),
(61, NULL, 'Cuando las cosas van mal suelo darme por vencido', 'A', 3, 0, 15),
(62, NULL, 'Tengo un humor bastante estable', 'B', 2, 0, 2),
(63, NULL, 'Si tengo que ayudar a los demás, abandono lo que esté haciendo en ese momento', 'B', 1, 1, 9),
(64, NULL, 'Prefiero fijarme metas poco ambiciosas para estar seguro de alcanzarlas', 'A', 3, 0, 13),
(65, NULL, 'Soy comprensivo con otras religiones, aunque no las comparta ni practique', 'C', 2, 1, 8),
(66, NULL, 'He dejado de hacer alguna cosa por falta de confianza en mí mismo', 'A', 3, 0, 5),
(67, NULL, 'Estoy dispuesto a ayudar a los nuevos compañeros que empiezan a trabajar', 'D', 3, 1, 9),
(68, NULL, 'Soy tajante cuando tomo una decisión y no contemplo cambiar de opinión', 'B', 2, 0, 6),
(69, NULL, 'Cuando empiezo algo tengo que terminar, aunque me cueste más de lo previsto', 'D', 3, 1, 15),
(70, NULL, 'Cuando hago una reclamación salgo victorioso sin tener que subir el tono de mi voz', 'B', 1, 1, 10),
(71, NULL, 'Si estoy a gusto en mi trabajo, el salario me importa muy poco', 'C', 1, 0, 16),
(72, NULL, 'Cuando algo me interesa, me dedico a ello sin sentir fatiga', 'C', 2, 1, 15),
(73, NULL, 'Si se me amontonan los problemas, me falta la confianza en mí mismo', 'A', 3, 0, 5),
(74, NULL, 'Me resulta fácil hablar con personas que no conozco de nada', 'A', 0, 1, 10),
(75, NULL, 'Últimamente tengo momentos malos y de inquietud', 'A', 0, 1, 2),
(76, NULL, 'Me desagrada la gente que llega tarde a una cita y se excusa con cualquier motivo', 'D', 0, 0, 6),
(77, NULL, 'Creo que las dificultades me han ayudado a superarme y desarrollarme', 'D', 3, 1, 13),
(78, NULL, 'Creo que soy competente y eficaz en mi trabajo', 'D', 3, 1, 5),
(79, NULL, 'Evito verme envuelto en situaciones de constante cambio', 'B', 2, 0, 7),
(80, NULL, 'Creo que la mejor forma de descanso es cambiar de actividad', 'B', 1, 1, 7),
(81, NULL, 'Me interesan las culturas diferentes a la mía', 'D', 3, 1, 8),
(82, NULL, 'Pienso dejar a otros la dirección de las actividades de grupo', 'B', 2, 0, 12),
(83, NULL, 'Me comporto de acuerdo a las normas sociales establecidas', 'C', 2, 1, 11),
(84, NULL, 'Me cuesta terminar las tareas monótonas y aburridas', 'B', 1, 1, 14),
(85, NULL, 'Intento estar localizable y disponible', 'D', 3, 1, 9),
(86, NULL, 'Me resulta difícil entablar una amistad con una persona extranjera', 'A', 3, 0, 8),
(87, NULL, 'Suelo mantener la sonrisa y la calma cuando me enfado con alguien', 'B', 1, 1, 6),
(88, NULL, 'Me gusta probar la comida de otros países', 'B', 1, 1, 8),
(89, NULL, 'Me gusta discutir y enfrentarme a los demás', 'A', 3, 0, 11),
(90, NULL, 'Yo soy mi mejor consejero', 'B', 2, 0, 12),
(91, NULL, 'En mi trabajo soy una persona metódica y sistemática', 'C', 1, 0, 7),
(92, NULL, 'El estrés del trabajo o de la calle me estimula y me mantiene vivo', 'B', 1, 1, 4),
(93, NULL, 'Me basto yo solo para resolver mis propios problemas', 'B', 1, 1, 5),
(94, NULL, 'Si alguien me decepciona, prefiero romper cuanto antes esa relación', 'B', 2, 0, 6),
(95, NULL, 'Me agrada pasar una tarde viendo programas de información cultural', 'B', 1, 1, 8),
(96, NULL, 'Evito dar una buena idea a otro porque se aprovechará de ella', 'A', 0, 1, 1),
(97, NULL, 'Los grandes fracasos afectan mi estado de ánimo', 'B', 2, 0, 15),
(98, NULL, 'Mis familiares y amigos me tratan bien', 'B', 2, 0, 1),
(99, NULL, 'Me gusta ser tratado como una persona de cierta importancia', 'B', 1, 1, 16),
(100, NULL, 'Dedico parte de mi tiempo libre a mejorar profesionalmente', 'B', 1, 1, 13),
(101, NULL, 'Creo que alguien logra que haga cosas mediante sugestión o algún poder mental', 'A', 0, 1, 1),
(102, NULL, 'Me siento inseguro en mis relaciones con los demás', 'A', 3, 0, 10),
(103, NULL, 'Cuando hay problemas me ofrezco para solucionarlos', 'D', 3, 1, 9),
(104, NULL, 'El entusiasmo me ayuda a sentirme seguro', 'D', 3, 1, 5),
(105, NULL, 'Tengo plena confianza en la capacidad de mis compañeros', 'C', 2, 1, 12),
(106, NULL, 'Soy capaz de realizar varias tareas a la vez', 'C', 2, 1, 9),
(107, NULL, 'Procuro descargarme con quien me enfada con sus tonterías.', 'A', 0, 1, 2),
(108, NULL, 'Mis amigos me confían sus temores y preocupaciones', 'C', 2, 1, 6),
(109, NULL, 'Me resulta fácil hacer nuevas amistades', 'D', 3, 1, 10),
(110, NULL, 'Soy tolerante con quienes no respetan las normas', 'B', 1, 1, 6),
(111, NULL, 'Me encuentro a gusto en entornos multirraciales', 'C', 2, 1, 8),
(112, NULL, 'Mantengo la calma en la mayoría de las situaciones', 'B', 2, 0, 2),
(113, NULL, 'Me siento atraído por las situaciones nuevas e inesperadas', 'B', 1, 1, 7),
(114, NULL, 'Los obstáculos y dificultades hacen que me supere para vencerlos', 'D', 3, 1, 13),
(115, NULL, 'A la hora de tomar una decisión, lo pienso con calma y sin alterarme', 'B', 2, 0, 2),
(116, NULL, 'Creo poco en mi valía personal', 'A', 0, 1, 3),
(117, NULL, 'Los problemas demasiado difíciles me agobian y desaniman', 'A', 3, 0, 15),
(118, NULL, 'He tenido la impresión de que me estaban vigilando sin que yo supiera porqué', 'A', 0, 1, 1),
(119, NULL, 'Cambiaría la mayoría de las normas y reglas sociales establecidas', 'B', 2, 0, 11),
(120, NULL, 'La mayoría de las cosas me dejan preocupado', 'B', 1, 1, 3),
(121, NULL, 'Me molesta que alguien use mis cosas sin pedirme permiso', 'C', 1, 0, 6),
(122, NULL, 'En las reuniones sociales tengo don para interactuar y platicar', 'B', 1, 1, 10),
(123, NULL, 'Para poder rendir en mi trabajo necesito hacer pausas frecuentes', 'B', 2, 0, 14),
(124, NULL, 'Tomo parte activa en los asuntos del grupo', 'B', 1, 1, 12),
(125, NULL, 'Me resulta difícil entablar una conversación con extraños', 'A', 3, 0, 10),
(126, NULL, 'Los demás me hieren con sus críticas y juicios personales', 'B', 2, 0, 5),
(127, NULL, 'Se me puede hacer cambiar de opinión', 'D', 3, 1, 6),
(128, NULL, 'Tiendo a criticar en exceso a los demás', 'B', 2, 0, 11),
(129, NULL, 'Pierdo fácilmente la paciencia cuando trato con los demás', 'A', 0, 1, 2),
(130, NULL, 'Cuando las cosas salen mal espero que otros las resuelvan', 'A', 3, 0, 9),
(131, NULL, 'En mi tiempo libre practico algún deporte', 'B', 1, 1, 14),
(132, NULL, 'Cuando viajo, me intereso por las costumbres y estilos de vida del lugar al que voy', 'D', 3, 1, 8),
(133, NULL, 'Me molesta cuando algún imprevisto irrumpe mi vida cotidiana', 'B', 2, 0, 7),
(134, NULL, 'Confío más en mí que en los demás', 'D', 0, 0, 12),
(135, NULL, 'Me siento más capaz de hacer cosas que antes', 'D', 0, 0, 3),
(136, NULL, 'Cuando mi jefe comete una injusticia conmigo trabajo con desgano', 'A', 0, 1, 16),
(137, NULL, 'Me siento libre de pensamientos extravagantes', 'C', 1, 0, 1),
(138, NULL, 'Cuando me propongo algo pongo los medios adecuados para conseguirlo', 'C', 2, 1, 13),
(139, NULL, 'Puedo seguir actuando con bastante normalidad cuando hay retos y tensiones en mi vida', 'C', 2, 1, 4),
(140, NULL, 'Antes de actuar me paro a pensar en lo que los demás piensen de mí', 'A', 3, 0, 5),
(141, NULL, 'Me comporto igual entre amigos que en público', 'A', 3, 0, 16),
(142, NULL, 'Soy tan feliz como la mayoría de personas', 'D', 0, 0, 3),
(143, NULL, 'Tengo la impresión de que la gente tiene mal concepto de mí', 'C', 2, 1, 1),
(144, NULL, 'Cuando la situación se pone tensa, mi cuerpo también se tensa y parece que voy a estallar', 'B', 2, 0, 4),
(145, NULL, 'Me resulta fácil hacer entrar en razón a los demás', 'D', 3, 1, 10),
(146, NULL, 'Cuando me topo con grandes obstáculos, prefiero buscar metas más asequibles', 'A', 3, 0, 15),
(147, NULL, 'Me gusta el riesgo y la aventura', 'B', 1, 1, 14),
(148, NULL, 'Prefiero la lectura y la contemplación a la actividad y el deporte', 'B', 2, 0, 14),
(149, NULL, 'Me gusta que reconozcan mis éxitos profesionales', 'D', 3, 1, 16),
(150, NULL, 'Por las noches suelo dormir de modo regular y tranquilo', 'C', 1, 0, 3),
(151, NULL, 'Si tuviera la oportunidad aprendería ruso', 'A', 0, 1, 8),
(152, NULL, 'Me molesta cuando alguien me pide ayuda para algo que podría hacerlo solo', 'A', 3, 0, 9),
(153, NULL, 'Me molesta y perturba tener que hablar a un grupo (como en una reunión social)', 'B', 2, 0, 11),
(154, NULL, 'Mantengo la calma en situaciones tensas', 'B', 1, 1, 4),
(155, NULL, 'Me molestar estar inactivo y no tener nada que hacer', 'D', 3, 1, 14),
(156, NULL, 'Me molesta estar mucho tiempo haciendo lo mismo.', 'D', 3, 1, 14),
(157, NULL, 'Me gustaría ser tan feliz como parecen los demás', 'A', 0, 1, 3),
(158, NULL, 'Me afectan poco los problemas de la vida cotidiana', 'A', 0, 1, 5),
(159, NULL, 'Disfruto organizando y participando en actividades sociales', 'D', 3, 1, 11),
(160, NULL, 'Trabajo mejor solo que con otros compañeros', 'B', 2, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `created`, `user_id`, `exam_id`, `status`) VALUES
(15, '2020-08-29 08:17:58', 2, 1, NULL),
(58, '2020-09-03 09:19:40', 1, 1, NULL),
(59, '2020-09-03 09:19:40', 1, 2, NULL),
(60, '2021-07-05 02:57:34', 5, 1, NULL),
(61, '2021-07-05 02:57:34', 5, 2, NULL),
(62, '2021-07-05 02:57:34', 5, 3, NULL),
(63, '2021-07-05 02:57:34', 5, 4, NULL),
(64, '2021-07-05 02:57:34', 5, 5, NULL),
(65, '2021-07-05 02:57:34', 5, 6, NULL),
(66, '2021-07-05 02:57:34', 5, 7, NULL),
(67, '2021-07-05 02:57:34', 5, 8, NULL),
(68, '2021-07-05 02:57:34', 5, 9, NULL),
(69, '2021-07-05 02:57:34', 5, 10, NULL),
(70, '2021-07-05 02:57:34', 5, 11, NULL),
(71, '2021-07-05 23:17:45', 6, 1, NULL),
(72, '2021-07-05 23:17:46', 6, 2, NULL),
(73, '2021-07-05 23:17:46', 6, 3, NULL),
(74, '2021-07-05 23:17:46', 6, 4, NULL),
(75, '2021-07-05 23:17:46', 6, 5, NULL),
(76, '2021-07-05 23:17:46', 6, 6, NULL),
(77, '2021-07-05 23:17:46', 6, 7, NULL),
(78, '2021-07-05 23:17:46', 6, 8, NULL),
(79, '2021-07-05 23:17:46', 6, 9, NULL),
(80, '2021-07-05 23:17:46', 6, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `approved` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created`, `approved`, `status`, `name`, `age`, `gender`, `email`, `password`) VALUES
(1, '2020-07-30 04:05:16', NULL, 1, 'nbvn', NULL, NULL, 'uno@correo.com', NULL),
(2, '2020-07-30 04:06:51', NULL, 1, 'manolo', NULL, NULL, 'manolo@correo.com', NULL),
(3, '2020-08-12 12:17:48', NULL, 1, 'sfsdf', NULL, 2, 'tres@correo.com', NULL),
(4, '2021-07-05 02:49:53', NULL, 1, 'adad', 22, 1, 'asd@asds.com', NULL),
(5, '2021-07-05 02:57:33', NULL, 1, 'asdasd', 213, 1, 'ads@casc.com', NULL),
(6, '2021-07-05 23:17:45', NULL, 1, 'sfa', 312, 1, '122@asd.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vocacional`
--

CREATE TABLE `vocacional` (
  `id` int(3) NOT NULL,
  `question` text NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vocacional`
--

INSERT INTO `vocacional` (`id`, `question`, `created`) VALUES
(1, 'Atender Clientes y publico en general', NULL),
(2, 'Estudiar las causas de las plagas que destruyen las plantas y los modos de combatirlas', NULL),
(3, 'Expresar sus imprevisiones personales a traves del dibujo, pintura o escultura', NULL),
(4, 'Observar la estructura y funcionamiento de los órganos del cuerpo', NULL),
(5, 'Aplicar métodos para aliviar los problemas y sufrimiento de las personas', NULL),
(6, 'Analizar las fuerzas que afectan las estructuras y estabilidad de un puente', NULL),
(7, 'Reconocer pecualiaridades de la geografia física y política del país para planificar la defensa del territorio', NULL),
(8, 'Practicar y promover ejercicios físicos qe favorezcan una vida sana y activa', NULL),
(9, 'Estudiar y comprender como funcionan los transformadores, generadores y motores eléctricos', NULL),
(10, 'Estar informado acerda del valor de las acciones y de las variaciones de los indicadores económicos', NULL),
(11, 'Estudiar la naturaleza ondulatoria de la energía, luz y ondas sonoras', NULL),
(12, 'Probar las caracteristicas de diferentes tipos de materia prima y procesamiento requerido para la fabricación de diversos productos industriales', NULL),
(13, 'Estudiar y comprender las características y funcionamiento de las computadoras', NULL),
(14, 'Leer reportajes, ensayos, cuento y novelas clásicas', NULL),
(15, 'Estudiar, formular y resolver problemas de álgebra y cálculo', NULL),
(16, 'Examinar el diseño y el funcionamiento de vehículos de trabajo tales como, tractores, camiones y ferrocarriles', NULL),
(17, 'Investigar distintos procesos de refinamiento de minerales', NULL),
(18, 'Aprender a leer, escribir o interpretar partituras de musicales', NULL),
(19, 'Transferir y difundir el arte, la ciencia y la tecnología', NULL),
(20, 'Estudiar las propiedades y estructura molecular de los elementos', NULL),
(21, 'Guiar y asesorar a grupos en la presentación de ideas y proyectos ante autoridades públicas', NULL),
(22, 'Analizar comparativamente las relaciones entre costos y utilidades de diferentes producciones avícolas', NULL),
(23, 'Redactar cartas, memorando e informes', NULL),
(24, 'Sembrar, regar, desmalezar y cosechar verduras y hortalizas', NULL),
(25, 'Contemplar la armonía de las formas y diseños de la naturaleza', NULL),
(26, 'Analizar la diferenciación morfológica y funcional de las células que componen a los seres vivos', NULL),
(27, 'Desarrollar estrategias y métodos para mejorar la calidad de vida de las personas', NULL),
(28, 'Comparar la resistencia de materiales de construcción frente al deterioro por efecto del fuego, sol o agua', NULL),
(29, 'Reconocer y promover los principios fundamentales que sustentan la Constitución Política de la Nación.', NULL),
(30, 'Guiar y entrenar a un grupo de deportistas', NULL),
(31, 'Analizar los métodos para transformar la energía eléctrica en luz, calor o movimiento', NULL),
(32, 'Analizar la gestión administrativa para mejorar la productividad de una determinada empresa', NULL),
(33, 'Aprender técnicas para transformar y conservar la energía', NULL),
(34, 'EStudiar y analizar las materias primas, las máquinas y los diferentes sistemas de fabricación de un mismo producto', NULL),
(35, 'Estar informado acerca de los avances y noticias en el campo de la computación', NULL),
(36, 'Conocer el origen y el significado de las palabras y la expresión verbal', NULL),
(37, 'Analizar y formular problemas de geometría analítica, vectorial y trigonometría plana', NULL),
(38, 'Observar y comprender el funcionamiento de motores diesel', NULL),
(39, 'Comprender los procesos geológicos que dieron lugar a la formación de los depósitos minerales', NULL),
(40, 'Estudiar, conocer y distinguir las caracteristicas de las diferentes corrientes musicales', NULL),
(41, 'Formular, los objetivos, contenidos y actividades de enseñanza de un curso', NULL),
(42, 'Estudiar y comprender como cambian las moléculas orgánicas bajo la influencia de la radioactividad', NULL),
(43, 'Participar en actividades grupales para la prevención de la drogadicción y la delincuencia', NULL),
(44, 'Averiguar sobre diferentes aplicaciones y utilidades de derivados de productos animales', NULL),
(45, 'Supervisar y guiar el trabajo del personal de una oficina', NULL),
(46, 'Plantar, podar, fumigar y hacer injertos en árboles frutales', NULL),
(47, 'Tomar y componer fotografías que expresen el sentido de la estética y la belleza', NULL),
(48, 'Observar los efectos de un compuesto químico sobre el funcionamiento de diferentes estructuras orgánicas', NULL),
(49, 'Desarrollar métodos para prevenir el deterioro físico y mental de las personas', NULL),
(50, 'Comprender las fuerzas y factores que influyen en las construcciónes antisísmicas', NULL),
(51, 'Analizar y comprender el significado de los acontecimientos históricos que consolidaron el nacimiento de la republica', NULL),
(52, 'Practicar, competir y entrenar atletismo periódicamente', NULL),
(53, 'Construir sistemas que permitan obtener electricidad desde fuentes naturales de energia', NULL),
(54, 'Administrar y supervisar el personal de una empresa', NULL),
(55, 'Estudiar la naturaleza y las aplicaciones de la eléctrica y mecánica', NULL),
(56, 'Planificar y proyectar las fases de la fabricación en serie de un producto', NULL),
(57, 'Indagar y aprender a usar diferentes aplicaciones de programas computacionales tales como sistemas operativos, procesadores de texto, graficadores y base de datos', NULL),
(58, 'Escribir literaria o periodísticamente y eventualmente, participar en concursos literarios', NULL),
(59, 'Representar gráficamente relaciones y funciones en un sistema cartesiano, octogonal de coordenadas', NULL),
(60, 'Revisar y curiosear acerca del funcionamiento de maquinaria pesada y de movimiento de tierra', NULL),
(61, 'Analizar o interpretar mapas, cartografías o fotografías aéreas', NULL),
(62, 'Averiguar, distinguir y comparar las raíces musicales que caracterizan cada pueblo y cultura', NULL),
(63, 'Educar a la juventud para enfrentar y prevenir los riesgos de la vida moderna', NULL),
(64, 'Reconocer las propiedades químicas de un medicamento que permiten clasificarlo dentro de una categoría', NULL),
(65, 'Conducir actividades y dinámicas grupales', NULL),
(66, 'Ver y analizar programas sobre la vida, conducta y características distintivas de las especies animales', NULL),
(67, 'Planificar y desarrollar proyectos para reorganización de los procesos administrativos de una oficina', NULL),
(68, 'Colaborar en la reforestación y protección de las áreas verdes, parques o bosques naturales', NULL),
(69, 'Hacer composiciones de forma, color y dimensiones espaciales', NULL),
(70, 'Comparar diferentes métodos para producir un compuesto orgánico', NULL),
(71, 'Orientar y guiar a las personas que solicitan su ayuda para solucionar sus problemas personales', NULL),
(72, 'Distinguir los distintos tipos de madeas y sus principales características y usos', NULL),
(73, 'Comprender las relaciones entre los poderes del estado y los organismos que deben resguardar su funcionamiento', NULL),
(74, 'Entrenar y promover en un grupo de personas la practica periódica de algun deporte', NULL),
(75, 'Diseñar circuitos eléctricos y/o electrónicos', NULL),
(76, 'Diseñar y planificar estrategias de marketing', NULL),
(77, 'Explorar los efectos de la energía térmica sobre los estados de la materia, sólidos, líquidos, y gases', NULL),
(78, 'visitar una industria y averiguar en directo las características específicas de sus procesos productivos', NULL),
(79, 'Explorar la manera de hacer con los programas computacionales cosas diferentes a las especificadas en los manuales', NULL),
(80, 'Escribir crónicas, cuentos y reportajes para una revista', NULL),
(81, 'Analizar, formular y resolver situaciones reales haciendo uso de ecuaciones diferenciales, ordinarias y parciales', NULL),
(82, 'Desarmar maquinaria en desuso y re-utilizar sus piezas para construir otras maquinarias', NULL),
(83, 'visitar, observar y caminar en cerros que presenten en formaciones geológicas especiales', NULL),
(84, 'Escuchar y conocer en detalle las obras musicales de un compositor o cantante', NULL),
(85, 'Facilitar, orientar y guiar el desarrollo de niños y jóvenes', NULL),
(86, 'Indagar y comprender los efectos ambientales de contaminantes químicos', NULL),
(87, 'Aprender sobre comunidades humanas especiales compartiendo con sus miembros', NULL),
(88, 'Conocer, proteger, cuidar o investigar en un ambiente natural a animales de contaminantes químicos', NULL),
(89, 'Organizar y controlar la documentación de una oficina de un modo fluido y accesible', NULL),
(90, 'Investigar las características, propiedades y aplicaciones de nuevas variedades de plantas', NULL),
(91, 'Observar el entorno, capturando la originalidad de las formas', NULL),
(92, 'Describir y comparar los procesos reproductivos entre las especies animales', NULL),
(93, 'Cuidar, tratar y proteger a personas enfermas', NULL),
(94, 'Analizar las técnicas y materiales utilizadas en la construcción de edificios habitacionales e industriales', NULL),
(95, 'Reconocer y divulgar los actos heroicos de las personas que sacrifican su propio bienestar en beneficio de los valores patrióticos', NULL),
(96, 'Estudiar y promover las técnicas para el desarrollo de la capacidad física y muscular', NULL),
(97, 'Entender los procesos físicos y lógicos implícitos en el funcionamiento de instrumentos eléctricos y electrónicos', NULL),
(98, 'Planificar, administrar y realizar las operaciones de venta de una empresa', NULL),
(99, 'Aprender sobre el comportamiento de las párticulas sub-atomicas', NULL),
(100, 'Analizar y describir innovaciones que permitan simplificar los proceso de producción industrial', NULL),
(101, 'Aprender lenguages de programación computacional', NULL),
(102, 'Interpretar obras literarias abstrayendo los sentimientos y pensamientos del escritor', NULL),
(103, 'Analizar y desarrollar aquellas expresiones matemáticas que se representan por el mismo tipo de curva', NULL),
(104, 'Aprender a trabajar con soldaduras, fresadora y tornos mecánicas para hacer piezas de acero', NULL),
(105, 'Visitar una planta de fundición y averiguar acerca de los procesos de refinamiento de minerales', NULL),
(106, 'Estudiar, explorar y averiguar acerca de los avances en tecnología del sonido', NULL),
(107, 'Enseñar y transmitir conocimiento científico y/o humanista a un grupo de alumnos', NULL),
(108, 'Experimentar fórmulas y procedimientos no tradicionales para obtener un compuesto químico', NULL),
(109, 'Actuar como líder de un grupo para proponer y conseguir una meta colectiva', NULL),
(110, 'Comparar la eficiencia de métodos extensivos e intensivos en la crianza de diferentes tipos de ganado', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vocaciones`
--

CREATE TABLE `vocaciones` (
  `id` int(2) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vocaciones`
--

INSERT INTO `vocaciones` (`id`, `name`, `created`) VALUES
(1, 'Acciones Administrativas', NULL),
(2, 'Agricultura', NULL),
(3, 'Artes Plástico-Gráficas', NULL),
(4, 'Biologia', NULL),
(5, 'Clinica', NULL),
(6, 'Construcción', NULL),
(7, 'Defensa de la Soberanía', NULL),
(8, 'Deportes', NULL),
(9, 'Electricidad-Electrónica', NULL),
(10, 'Empresa', NULL),
(11, 'Física', NULL),
(12, 'Industria', NULL),
(13, 'Informática', NULL),
(14, 'Literatura', NULL),
(15, 'Matemáticas', NULL),
(16, 'Mecánica', NULL),
(17, 'Minería y Geología', NULL),
(18, 'Música', NULL),
(19, 'Pedagogía', NULL),
(20, 'Química', NULL),
(21, 'Social', NULL),
(22, 'Veterinaria', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clavesraven`
--
ALTER TABLE `clavesraven`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coloref`
--
ALTER TABLE `coloref`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `conductual`
--
ALTER TABLE `conductual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eynseck`
--
ALTER TABLE `eynseck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboral`
--
ALTER TABLE `laboral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalidad`
--
ALTER TABLE `personalidad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `push`
--
ALTER TABLE `push`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `tepetes`
--
ALTER TABLE `tepetes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vocacional`
--
ALTER TABLE `vocacional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vocaciones`
--
ALTER TABLE `vocaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `coloref`
--
ALTER TABLE `coloref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;
--
-- AUTO_INCREMENT for table `conductual`
--
ALTER TABLE `conductual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `eynseck`
--
ALTER TABLE `eynseck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tepetes`
--
ALTER TABLE `tepetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vocacional`
--
ALTER TABLE `vocacional`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `vocaciones`
--
ALTER TABLE `vocaciones`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
